<!doctype html>
<html>
    <head>
        <title>Search payments from an e-mail in January</title>
    </head>
    <body>
        <?php
        /**
         * MercadoPago SDK
         * Search payments from an e-mail in January
         * @date 2012/03/29
         * @author hcasatti
         */
        // Include Mercadopago library
        require_once "../../lib/mercadopago.php";

        // Create an instance with your MercadoPago credentials (CLIENT_ID and CLIENT_SECRET):
        // Argentina: https://www.mercadopago.com/mla/herramientas/aplicaciones
        // Brasil: https://www.mercadopago.com/mlb/ferramentas/aplicacoes
        // Mexico: https://www.mercadopago.com/mlm/herramientas/aplicaciones
        // Venezuela: https://www.mercadopago.com/mlv/herramientas/aplicaciones
        // Colombia: https://www.mercadopago.com/mco/herramientas/aplicaciones
        // Chile: https://www.mercadopago.com/mlc/herramientas/aplicaciones
        $mp = new MP("CLIENT_ID", "CLIENT_SECRET");

        // Sets the filters you want
        $filters = array(
            "payer.email" => "mail02@mail02.com",
            "begin_date" => "2011-01-01T00:00:00Z",
            "end_date" => "2011-02-01T00:00:00Z"
        );

        // Search payment data according to filters
        $searchResult = $mp->search_payment($filters);

        // Show payment information
        ?>
        <table border='1'>
            <tr><th>id</th><th>external_reference</th><th>status</th></tr>
            <?php
            foreach ($searchResult["response"]["results"] as $payment) {
                ?>
                <tr>
                    <td><?php echo $payment["id"]; ?></td>
                    <td><?php echo $payment["external_reference"]; ?></td>
                    <td><?php echo $payment["status"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
