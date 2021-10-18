<?php

session_start();
include_once "function.php";
$user_id = $_SESSION['id'] ?? 0;
if (!$user_id) {
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dictionary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container p-5">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <h4>Menu</h4>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action"><a href="#" class="main-menu" data-target="words">All Word</a></li>
                        <li class="list-group-item list-group-item-action"><a href="#" class="main-menu" data-target="wordform">Add New Word</a></li>
                        <li class="list-group-item list-group-item-action"><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 felement" id="words">
                <h4>All Words</h4>

                <div class="row">
                    <div class="col-md-6">
                        <select name="" id="alphabat" class="form-control">
                            <option value="All">All</option>
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                            <option value="f">F</option>
                            <option value="g">G</option>
                            <option value="h">H</option>
                            <option value="i">I</option>
                            <option value="j">J</option>
                            <option value="k">K</option>
                            <option value="l">L</option>
                            <option value="m">M</option>
                            <option value="n">N</option>
                            <option value="o">O</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <input type="search" name="search" id="" class="form-control" placeholder="search">
                    </div>
                </div>
                <table class="table table-bordered table-striped mt-3" id="table">
                    <thead>
                        <tr>
                            <th>Word Name</th>
                            <th>Word Meaning</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $data =  getWords($user_id) ?? '';

                        while ($_data = mysqli_fetch_assoc($data)) {
                        ?>
                            <tr>
                                <td> <?php echo $_data['words'] ?> </td>
                                <td><?php echo $_data['meaning'] ?> </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-8 felement" style="display: none;" id="wordform">
                <h4>Add New Words</h4>

                <form action="tasks.php" method="post">
                    <label for="word">New Word</label>
                    <input type="text" name="word" class="form-control" id="name">

                    <label for="meaning">Meaning</label>

                    <textarea name="meaning" id="" cols="10" rows="5" class="form-control"></textarea>


                    <br>
                    <input type="hidden" name="action" value="addword">
                    <input type="submit" value="Add Word" name="button" class="btn btn-primary">
                </form>
            </div>


        </div>
    </div>



</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="script.js"></script>



<script>
    $(document).ready(function() {
        $(".main-menu").on("click", function() {
            $(".felement").hide();
            var target = "#" + $(this).data("target");
            $(target).show();
        })

        // $("#alphabat").on("change", function() {
        //     var alphabate = $(this).val().toLowerCase();

        //     if ('all' == alphabate) {
        //         $("#table tr").show();
        //         return true;
        //     }

        //     $("#table tr:gt(0)").hide();
        //     $("td").filter(function() {

              
        //    return ($(this).text().indexOf(alphabate) == 0);
        //     }).parent().show();

        // })
    })


    // $(document).ready(function(){
    //     $(".main-menu1").on('click', function(){


    //         $("#wordform").hide();
    //         $("#words").show();
    //     })

    //     $(".main-menu2").on('click', function(){


    //       $("#wordform").show();
    //       $("#words").hide();
    //   })
    // })
</script>

</html>