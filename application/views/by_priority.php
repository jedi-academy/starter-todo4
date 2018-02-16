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
        <h3>Tasks by Priority</h3>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Priority</th>
                </tr>
                {display_tasks}
                <tr>
                    <td>{id}</td>
                    <td>{task}</td>
                    <td>{priority}</td>
                </tr>
                {/display_tasks}    
            </table>
    </body>
</html>
