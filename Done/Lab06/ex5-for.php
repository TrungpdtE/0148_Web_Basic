<!DOCTYPE html>
<html lang="en">

<head>
    <title>EX5</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            transition: background-color 0.1s ease;
            padding: 0;
        }

        #board {
            width: 300px;
        }

        .cell {
            width: 30px;
            height: 30px;
            background-color: rgb(255, 255, 255);
            border: 0.5px solid black;
            padding: 0;
        }

        .row {
            margin-left: 0 !important;
        }

        img {
            object-fit: cover;
            width: 100%;
            transform: matrix(1, 0, 0, 1, 0, 0);
        }

        .changed {
            width: 500px
        }

        #text-changed {
            background-color: #d4eddb;
        }

        #color-rgb {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="board" class="container">
        <div class="row my-3">
            <div class="col m-0 p-0">
                <p id="color-rgb" class="h3 text-center my-3 bg-primary py-2 rounded text-white">
                    rgb(0, 0, 0)
                </p>
            </div>
        </div>


        <div class="row">
            <div class="col p-0">
                <?php
                $num_rows = 10;
                $num_cols = 10;
                for ($i = 0; $i < $num_rows; $i++) {
                    echo "<div class='row'>";
                    for ($j = 0; $j < $num_cols; $j++) {
                        $r = rand(0, 255);
                        $g = rand(0, 255);
                        $b = rand(0, 255);
                        echo "<div class='col d-flex pl-0 pr-0'><div class='cell' style='background-color: rgb($r, $g, $b);'></div></div>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid changed">
        <p id="text-changed" class="text-center my-3 py-2 rounded">
            Background color has been changed.
        </p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let default_color = $("body").css("background-color");
            let text_box = $("#color-rgb");
            text_box.text(default_color);
            let changed_box = $("#text-changed");
            changed_box.hide();
            $(".row > .col > .cell")
                .each(function(index, elem) {
                    $(elem).hover(function(event) {
                        let temp_color = $(event.target).css("background-color");
                        $("body").css("background-color", temp_color);
                        text_box.text(temp_color);
                    }, function() {
                        $("body").css("background-color", default_color);
                        text_box.text(default_color);
                    }).click(function(event) {
                        let temp_color = $(event.target).css("background-color");
                        default_color = temp_color;

                        $("body").css("background-color", default_color);
                        text_box.text(temp_color);

                        changed_box.text("Background color has been changed.");
                        changed_box.show().delay(3000).fadeOut();
                    });
                });

            text_box.click(function(event) {
                changed_box.text("Color has been copied to the clipboard");
                changed_box.show().delay(3000).fadeOut();
            });
        });
    </script>
</body>

</html>