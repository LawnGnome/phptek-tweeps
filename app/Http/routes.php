<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $tweeps = DB::table('tweeps')->paginate(30);
    ob_start();

?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>#phptek tweeps</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
  </head>
  <body role="document">
    <div class="container">
      <h1>#phptek tweeps</h1>

      <?= $tweeps->links() ?>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Account</th>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tweeps as $tweep): ?>
            <tr>
              <td><?= $tweep->account ?></td>
              <td><?= $tweep->name ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

      <?= $tweeps->links() ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php

    return ob_get_clean();
});
