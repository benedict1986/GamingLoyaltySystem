<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="TestingController.php" method="POST">
            <select name="function">
                <option value="db_insert">db_insert'</option>
                <option value="db_selection">db_selection'</option>
                <option value="loyalty_model_insert">loyalty_model_insert'</option>
                <option value="loyalty_view_model_select_top_ten">loyalty_view_model_select_top_ten'</option>
                <option value="loyalty_view_model_select_games">loyalty_view_model_select_games'</option>
            </select>
            <input type="submit" value="Test" />
        </form>
    </body>
</html>
