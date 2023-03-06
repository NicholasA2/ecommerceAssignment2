<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js%22%3E%22%3E"></script>
        <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css " rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title><?= $data ?></title>
        <div class='container'>
                <a href='/Main/index'><img src="/images/cliquebait.png" style="max-width: 250;"/></a>
                <form action="/Main/search" method="get" style='display:inline-block'>
                    <div class="input-group">
                        <input type="search" name='search_term' class="form-control" placeholder="Enter search term"/>
                        <button type="submit" class="btn btn-primary" value="Search"><i class="bi-eye"></i></button>
                    </div>
                </form>
                <?php 
                    if (!isset($_SESSION['user_id'])) {?>
                        <a href="/User/index"><i style="font-size: 2rem;" class='bi-door-closed' title="Log in"></i></a>
                        <a href="/User/register"><i style="font-size: 2rem;" class='bi-person-add' title="Register"></i></a>
                <?php } else { ?>
                        <a href="/User/logout"><i style="font-size: 2rem;" class='bi-file-x' title="Log Out"></i></a>
                        <a href="/Profile/index"><i style="font-size: 2rem;" class='bi-person-fill' title="Profile"></i></a>
                        <a href="/Publication/create"><i style="font-size: 2rem;" class='bi-clipboard2-plus' title="New Post"></i></a>
                <?php    } ?>
        </div>
    </head>
    <body style="text-align: center;">