<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>

<body>
    <form  action=<?= route('user.store');?> method='POST'>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" />
        <label for="year">Year</label>
        <input type="number" id="year" name="year" />
        <button>Create User</button>
    </form>

    <button><a href=<?= route('home.index')?>>Back to index</a></button>
</body>

</html>