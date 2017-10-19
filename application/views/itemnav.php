{pagination}
<table class="table">
        <tr>
                <th>Id</th>
                <th>Task</th>
                <th>Status</th>
        </tr>
        {display_tasks}
</table>
<ul class="nav nav-pills">
        <li><a href="/mtce/page/{first}">First</a></li>
        <li><a href="/mtce/page/{previous}">Previous</a></li>
        <li><a href="/mtce/page/{next}">Next</a></li>
        <li><a href="/mtce/page/{last}">Last</a></li>
</ul>