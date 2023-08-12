<?php
require_once 'header.php';
require_once 'dbhinc.php';
?>
<div class="container">
    <div class="index-intro">
        <?php
        if (isset($_SESSION["useruid"])) {
            echo "<h3 style = 'color: #adb0fa;'>Hello admin " . $_SESSION["useruid"] . "</h3>";
        }
        ?>
        <h1>Welcome to Dobbmo</h1>
        <?php
        if (isset($_SESSION["useruid"])) {
            echo "<p>This website for the mangers to add or delete games.</p>";
        } else {
            echo "<p>Please LOG IN</p>";
        }
        ?>

    </div>

    <div class="games">

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM games;";
                $result = mysqli_query($conn, $sql);
                $resultc = mysqli_num_rows($result);

                if ($resultc > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>";
                        echo $row['name'];
                        echo "</td><td>";
                        echo $row['price'];
                        echo "</td><td>";
                        if (isset($_SESSION["useruid"])) {
                            echo '<form method="post" action="del.php"><input type="hidden" ';
                            echo 'name="id" value="' . $row['id'] . '">';
                            echo '<input class="button-31" type="submit" value="delete" name="del">';
                            echo "</form>";
                            echo "</td></tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_SESSION["useruid"])) {
            echo " <form action='addgames.php' method='POST'>";
            echo " <input type='text' name='name' placeholder='Game Name'>";
            echo " <input type='text' name='price' placeholder='Price'>";
            echo "<button  class='button-31' type='submit' name='submit'>Add</button>";
            echo " </form>";
        }

        if (isset($_GET["error"])) {

            if ($_GET["error"] == "emptyinput") {
                echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Fill in all fields!</p>";
            } else if ($_GET["error"] == "stmtfaild") {
                echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Something went wrong,try again!</p>";
            } else if ($_GET["error"] == "gameExists") {
                echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>Game is already there are you blind ?!!!</p>";
            } else if ($_GET["error"] == "delSuccessfully") {
                echo "<p style = 'text-align: center;font-size: 30px;color: #505376; font-weight: bold;'>Deleted :)</p>";
            }
            else if ($_GET["error"] == "delFailed") {
                echo "<p style = 'text-align: center;font-size: 30px;color: red; font-weight: bold;'>something wrong! :)</p>";
            }
        }
        ?>

    </div>
</div>
</body>

</html>