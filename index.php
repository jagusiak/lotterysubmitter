<!DOCTYPE html>
<?php 
    require __DIR__ . '/vendor/autoload.php';
    use Jagusiak\LotteryApi;
?>


<html>
    <head>
        <title>Paragon</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
        <link href='css/receipt.css' rel='stylesheet' type='text/css'>
        <style>
            .year-month::before {content: "<?php echo date("Y/m/"); ?>";};
        </style>
        
    </head>
    <body>
        <div class="container">

            <div class="row">

                <h3>Wypełnianie paraganów</h3><hr/>

            </div>

            <div class="row">

                <div class="seven columns">
                    <form id="main">
                        <div class="row">
                            <div class="six columns">
                                <label for="vat-number">NIP:</label>
                                <input class="u-full-width number validate" type="text" min="1000000000" max="9999999999" id="vat-number">
                            </div>
                            <div class="six columns">
                                <label for="day">Data:</label> 
                                <span class="year-month">
                                    <input class="u-full-width number validate" type="text" max="31" min="1" id="day" >
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="six columns">
                                <label for="receipt-number">Nr paragonu:</label>
                                <input class="u-full-width no-white-space string validate" min="1" type="text"  id="receipt-number">
                            </div>
                            <div class="six columns">
                                <label for="price">Cena:</label>
                                <span class="pln">
                                    <input class="u-full-width no-white-space number validate" type="text" min="10.00" step="0.01" id="price">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="six columns">
                                <label for="device-number">Nr kasy:</label>
                                <input class="u-full-width no-white-space uppercase" type="text" placeholder="" id="device-number">
                            </div>
                            <div class="six columns">
                                <label for="brand">Branża</label>
                                <?php
                                $lottery = LotteryApi\LotteryApi::getInstance()->fillLoterry();
                                foreach ($lottery->getBrands() as $key => $value) {
                                ?>
                                <label>
                                    <input type="checkbox" id="brand" value="<?php echo $value; ?>">
                                    <span class="label-body"><?php echo $key; ?></span>
                                </label>
                                <?php }?>
                            </div>
                        </div>
                        <div class="info" id="info"></div>
                        <input class="u-pull-right button-primary" type="submit" value="Wyślij">
                    </form>
                </div>
                <div class="five columns" style="border-left: 1px dotted gray;padding-left: 10px">
                    <form id="sub">
                        <div class="row">
                            <div class="twelve columns">
                                <label for="email">Email:</label>
                                <input class="u-full-width no-white-space validate" type="email" placeholder="example@host.domain" id="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                            <label for="phone">Telefon</label>
                            <span class="phone">
                                <input class="u-full-width no-white-space number validate" type="text" min="100000000" max="999999999" placeholder="" id="phone">
                            </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <script src="js/receipt.js"></script>
    </body>
</html>
