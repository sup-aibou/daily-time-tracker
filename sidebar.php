<div class="h-screen w-64 bg-gray-800 text-gray-200 flex flex-col">
    <div class="p-4 text-xl font-semibold">
        Dashboard
    </div>
    <nav class="mt-4 flex-1">
        <ul>
        <li class="px-4 py-2 hover:bg-gray-700 <?php if($page=="home") {echo "active";}?>"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em>home</a></li>
        <li class="px-4 py-2 hover:bg-gray-700 <?php if($page=="manage-your-records") {echo "active";}?>"><a href="manage-your-records.php"><em class="fa fa-dashboard">&nbsp;</em>manage your records</a></li>
        </ul>
    </nav>
</div>
