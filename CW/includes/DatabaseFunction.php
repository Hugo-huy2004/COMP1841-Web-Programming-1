<?php 
    // ========================= UTILITY FUNCTIONS =========================
    
    function query($pdo, $sql, $params = []) {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    function upDateImage($pdo, $tableName, $columnImage, $fileImage, $idNameTable, $id){
        $sql = "UPDATE $tableName SET $columnImage = :image WHERE $idNameTable = :id";
        $params = [
            ':image' => file_get_contents($fileImage),
            ':id' => $id
        ];
        query($pdo, $sql, $params);
    }

    function headerManage($pdo, $forAdmin, $forMember, $id){
        $user = getUserByID($pdo, $id);
        if($user['Role']=='admin'){
            header ("location: $forAdmin");
            exit();
        }
        if($user['Role']=='member'){
            header("location: $forMember");
            exit();
        }
    }

    // ========================= USER FUNCTIONS =========================

    function getUserByEmail($pdo, $email) {
        $params = ['email' => $email];
        $user = query($pdo, "SELECT * FROM User WHERE email = :email", $params);
        return $user->fetch();
    }

    function getUserByID($pdo, $userID) {
        return query($pdo, "SELECT * FROM User WHERE userID = :userID", [':userID'=>$userID]) ->fetch();
    }

    function getAllMembers($pdo) {
        $members = query($pdo, "SELECT * FROM User");
        return $members->fetchAll();
    }

    function addNewUser($pdo, $username, $fullname, $email, $password, $address, $phonenumber, $role) {
        $params = [
            ':username' => $username,
            ':fullname' => $fullname,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':address' => $address,
            ':phonenumber' => $phonenumber,
            ':role' => $role
        ];
        query($pdo, 'INSERT INTO User SET
            Username = :username,
            Fullname = :fullname,
            Email = :email,
            Password = :password,
            Address = :address,
            Phonenumber = :phonenumber,
            Role = :role,
            createDate = CURDATE()',
            $params);
    }

    function addUser($pdo, $username, $email, $phonenumber, $role, $fullname, $address, $password) {
        query($pdo, "INSERT INTO User (Username, Email, Phonenumber, Role, Fullname, Address, Password)
                    VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$username, $email, $phonenumber, $role, $fullname, $address, password_hash($password, PASSWORD_DEFAULT)]);
    }

    function updateUserInfo($pdo, $userID, $fullname, $email, $address, $phonenumber) {
        $params = [
            ':fullname' => $fullname,
            ':email' => $email,
            ':address' => $address,
            ':phonenumber' => $phonenumber,
            ':userID' => $userID
        ];
        $sql = "UPDATE User SET Fullname = :fullname, Email = :email, Address = :address, Phonenumber = :phonenumber WHERE userID = :userID";
        $stmt = query($pdo, $sql, $params);
        return $stmt;
    }

    function updateUserData($pdo, $userID, $fullname, $email, $address, $phonenumber) {
        query($pdo, "UPDATE User SET Fullname = ?, Email = ?, Address = ?, Phonenumber = ? WHERE userID = ?", 
            [$fullname, $email, $address, $phonenumber, $userID]);
    }

    function searchUsers($pdo, $search) {
        $keyword = "%" . $search . "%";
        $stmt = query($pdo, "SELECT * FROM User WHERE Username LIKE ? OR Email LIKE ? OR Phonenumber LIKE ?", [$keyword, $keyword, $keyword]);
        return $stmt->fetchAll();
    }

    function deleteUserById($pdo, $userID) {
        query($pdo, "DELETE FROM User WHERE userID = :userID", ['userID' => $userID]);
    }

    function getUserAvatar($pdo, $userID) {
        $user = getUserByID($pdo, $userID);
        return $user['userAvatar'] ?? '';
    }

    function isAdmin($pdo, $userID) {
        $stmt = $pdo->prepare("SELECT role FROM User WHERE userID = :userID");
        $stmt->execute(['userID' => $userID]);
        $role = $stmt->fetchColumn();
        return $role === 'admin';
    }

    function isMember($pdo, $userID) {
        $stmt = $pdo->prepare("SELECT role FROM User WHERE userID = :userID");
        $stmt->execute(['userID' => $userID]);
        $role = $stmt->fetchColumn();
        return $role === 'member';
    }

    function getAllAdmins($pdo){
        
        $admins = query($pdo, 'SELECT * FROM User WHERE Role = "admin"');
        return $admins;
    }

    function getAllUsers($pdo){
        $users = query($pdo, 'SELECT * FROM User');
        return $users;
    }


    // ========================= MODULE FUNCTIONS =========================

    function getAllModule($pdo) {
        $modules = query($pdo, "SELECT * FROM Module");
        return $modules->fetchAll();
    }

    function addModule($pdo, $ModuleName, $ModuleDiscription, $ModuleCreateDate) {
        $params = [
            ':moduleName' => $ModuleName,
            ':moduleDiscription' => $ModuleDiscription,
            ':moduleCreateDate' => $ModuleCreateDate
        ];
        $sql = "INSERT INTO Module (ModuleName, ModuleDiscription, ModuleCreateDate) VALUES (:moduleName, :moduleDiscription, :moduleCreateDate)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $pdo->lastInsertId();
    }

    function editModule($pdo, $ModuleID, $ModuleName, $ModuleDiscription) {
        $params = [
            ':moduleName' => $ModuleName,
            ':moduleDiscription' => $ModuleDiscription,
            ':moduleID' => $ModuleID
        ];
        $sql = "UPDATE Module SET ModuleName = :moduleName, ModuleDiscription = :moduleDiscription WHERE ModuleID = :moduleID";
        query($pdo, $sql, $params);
    }

    function deleteModule($pdo, $ModuleID) {
        $stmt = query($pdo, "DELETE FROM Module WHERE ModuleID = :moduleID", ['moduleID' => $ModuleID]);
        return $stmt;
    }

    function getModuleWithPostCount($pdo) {
        $sql = "SELECT m.ModuleID, m.ModuleName,m.ModuleDiscription, COUNT(p.PostID) as PostCount
                FROM Module m
                LEFT JOIN Post p ON m.ModuleID = p.ModuleID
                GROUP BY m.ModuleID, m.ModuleName";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPostsByModule($pdo, $ModuleID) {
        $sql = "SELECT PostID, Post.userID, Content, Title, Module.ModuleName, DateOfPost, User.Fullname, User.userAvatar FROM Post INNER JOIN User ON Post.userID = User.userID INNER JOIN Module ON Post.ModuleID = Module.ModuleID WHERE Post.ModuleID = :ModuleID;";
        $posts = query($pdo, $sql, [':ModuleID'=>$ModuleID]);
        return $posts->fetchAll();
    }
    

    function getModuleByID($pdo, $ModuleID){
        $module = query($pdo, 'SELECT * FROM Module WHERE ModuleID = :ModuleID',[':ModuleID' => $ModuleID]);
        return $module ->fetch();
    }

    // ========================= POST FUNCTIONS =========================

    function getAllPost($pdo) {
        $Accumulator = query($pdo, "SELECT PostID, Post.userID, Content, Title, Module.ModuleName, DateOfPost, User.Fullname, User.userAvatar, Post.PostImage FROM Post INNER JOIN User ON Post.userID = User.userID INNER JOIN Module ON Post.ModuleID = Module.ModuleID;");
        return $Accumulator->fetchAll();
    }

    function getPostByID($pdo, $PostID) {
        $params = ['postID' => $PostID];
        $sql = "SELECT Post.*, User.Fullname, User.userAvatar, Module.ModuleName
                FROM Post
                INNER JOIN User ON Post.userID = User.userID
                INNER JOIN Module ON Post.ModuleID = Module.ModuleID
                WHERE Post.PostID = :postID";
        $post = query($pdo, $sql, $params);
        return $post->fetch();
    }

    function addPost($pdo, $userID, $Title, $Content, $ModuleID, $PostImage) {
        $params = [
            ':userID' => $userID,
            ':title' => $Title,
            ':content' => $Content,
            ':moduleID' => $ModuleID,
        ];
        $sql = "INSERT INTO Post (userID, Title, Content, ModuleID, DateOfPost) 
        VALUES (:userID, :title, :content, :moduleID, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        if ($PostImage) {
            updateImage($pdo,
            'Post',
            'PostImage',
            $PostImage,
            'PostID',
            $pdo -> lastInsertId());
        }
    }

    function updatePost($pdo, $postID, $title, $content, $moduleID) {
        $params = [
            ':title' => $title,
            ':content' => $content,
            ':moduleID' => $moduleID,
            ':postID' => $postID
        ];
        $sql = "UPDATE Post SET Title = :title, Content = :content, ModuleID = :moduleID WHERE PostID = :postID";
        $stmt = query($pdo, $sql, $params);
        return $stmt;
    }

    function deletePost($pdo, $postID) {
        $stmt = $pdo->prepare("DELETE FROM Post WHERE PostID = ?");
        return $stmt->execute([$postID]);
    }

    // ========================= COMMENT FUNCTIONS =========================

    function addComment($pdo, $postID, $userID, $repContent) {
        $params = [
            ':postID' => $postID,
            ':userID' => $userID,
            ':repContent' => $repContent
        ];
        $sql = "INSERT INTO RepPost (PostID, RepContent, DateOfReply, userID)
                VALUES (:postID, :repContent, NOW(), :userID)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $pdo->lastInsertId();
    }

    function getCommentsByPost($pdo, $postID) {
        $sql = "SELECT r.RepPostID, r.PostID, r.RepContent, r.DateOfReply,
                    r.userID, u.Fullname, u.userAvatar
                FROM RepPost r
                INNER JOIN User u ON r.userID = u.userID
                WHERE r.PostID = :postID
                ORDER BY r.DateOfReply DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':postID' => $postID]);
        return $stmt->fetchAll();
    }

    function getCommentByID($pdo, $repPostID) {
        $stmt = $pdo->prepare("SELECT * FROM RepPost WHERE RepPostID = ?");
        $stmt->execute([$repPostID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getCommentsForPosts($pdo, $posts) {
        $commentsByPost = [];
        foreach ($posts as $p) {
            $commentsByPost[$p['PostID']] = getCommentsByPost($pdo, $p['PostID']);
        }
        return $commentsByPost;
    }

    function updateComment($pdo, $repPostID, $repContent) {
        $stmt = $pdo->prepare("UPDATE RepPost SET RepContent = ? WHERE RepPostID = ?");
        return $stmt->execute([$repContent, $repPostID]);
    }

    function deleteComment($pdo, $commentID) {
        query($pdo, 'DELETE FROM RepPost WHERE RepPostID = :commentID', ['commentID' => $commentID]);
    }

    // ========================= EMAIL FUNCTIONS =========================

    function sendMail($pdo, $Sender, $Receiver, $Subject, $Message){
        $params = [
            ':sender'=>$Sender,
            ':receiver'=>$Receiver,
            ':subject'=>$Subject,
            ':message'=>$Message
        ];
        query($pdo, 'INSERT INTO Mail(Sender, Receiver, Subject, Message)
        VALUES (:sender, :receiver, :subject, :message)', $params);  
    }

    function getReceivedMailOfUser($pdo, $userID){
        $params =[
            ':userID'=>$userID
        ];
        $stmt = query($pdo,'SELECT 
            MailID, User.Email as Sender, User.userAvatar, Mail.Subject, Mail.Message,  Mail.MailDate 
            FROM Mail 
            INNER JOIN User ON User.userID = Mail.Sender
            WHERE Mail.Receiver =:userID', $params);
        return $stmt->fetchAll();
    }
    function getSentMailOfUser($pdo, $userID){
        $params =[
            ':userID'=>$userID
        ];
        $stmt = query($pdo,'SELECT 
            MailID, User.Email, User.userAvatar, Mail.Subject, Mail.Message,  Mail.MailDate 
            FROM Mail 
            INNER JOIN User ON User.userID = Mail.Sender
            WHERE Mail.Sender =:userID', $params);
        return $stmt->fetchAll();
    }

    function deleteMail($pdo, $mailID){
        $params =[
            ':mailID' => $mailID
        ];
        query($pdo, 'DELETE FROM Mail WHERE Mail.MailID = :mailID', $params);
    }

    