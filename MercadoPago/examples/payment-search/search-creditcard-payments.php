<!doctype html>
<html>
    <head>
        <title>Search approved credit card payments from 21/10/2011 to 25/10/2011</title>
    </head>
    <body>
        <?php
        /**
         * MercadoPago SDK
         * Search approved credit card payments from 21/10/2011 to 25/10/2011
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
            "range" => "date_created",
            "begin_date" => "2011-10-21T00:00:00Z",
            "end_date" => "2011-10-25T24:00:00Z",
            "payment_type_id" => "credit_card",
            "operation_type" => "regular_payment"
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
