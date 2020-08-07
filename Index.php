<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <?php
    include 'Action.php';
    ?>
    <div class="container">
        <h1 class="center">CRUD APP PHP</h1>
        <?php if(isset($_SESSION['response'])) { ?>
            <div class="row">
                <div class="col s12 m4 offset-m4">
                    <div class="card-panel <?= $_SESSION['responseStatusColor']?>">
                        <span class="white-text">
                            <?= $_SESSION['response'] ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col s12 m5">
                <?php if($currentPost->id=="") { ?>
                    <h2 class="center">ADD FORM</h2>
                <?php } else  {?>
                    <h2 class="center">UPDATE FORM</h2>
                <?php } ?>
                <div class="row">
                    <form class="col s12" action="Action.php" method="post">
                        <div class="row">
                            <input type="hidden" value="<?= $currentPost->id?>" name="id">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" class="validate" name="name" value="<?= $currentPost->userName?>">
                                <label for="icon_prefix">First Name</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">message</i>
                                <input id="icon_message" type="tel" class="validate" name="message" value="<?= $currentPost->message?>">
                                <label for="icon_message">Message</label>
                            </div>
                            <div class="input-field col s12 centered">
                                <?php if($currentPost->id=="") { ?>
                                    <button class="btn btn-large col s12 yellow darken-2" type="submit" name="add">ADD</button>
                                <?php } else  {?>
                                    <button class="btn btn-large col s12 yellow darken-2" type="submit" name="update">UPDATE</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12 m7">
                <?php
                $query = "select * from post";
                $posts = $db->query($query);
                ?>
                <h2 class="center">POSTS</h2>
                <table class="centered striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = $posts->fetch_assoc()){?>
                        <tr>
                            <td><?= $row["user_name"];?></td>
                            <td><?= $row["message"];?></td>
                            <td><?= $row["changes_date"];?></td>
                            <td>
                                <a class="btn yellow darken-2" href="Index.php?edit=<?= $row["id"];?>"><i class="material-icons ">edit</i></a>
                                <a class="btn red" href="Action.php?delete=<?= $row["id"];?>"><i class="material-icons ">delete</i></a>
                            </td>
                        </tr>
                    <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>