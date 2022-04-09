<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img style="width: 30px;" class="app-sidebar__user-avatar" src="../../systemcontrol/assets/img/avatars/default.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">
            <?php SessionUser::getUser('user_fname'); ?>
            <?php SessionUser::getUser('user_lname'); ?>
          </p>
          <p class="app-sidebar__user-designation">Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="../../systemcontrol/dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="../../systemcontrol/blank.php"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="../../systemcontrol/form.php"><i class="icon fa fa-circle-o"></i> Form</a></li>
            <li><a class="treeview-item" href="../../systemcontrol/table.php"><i class="icon fa fa-circle-o"></i> Table</a></li>
          </ul>
        </li>
      </ul>
    </aside>