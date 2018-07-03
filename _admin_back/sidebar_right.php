<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: Regex The Speed Inproved PHP Login, 
// Website & User Management
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
// 07-2017
#####################################################
?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a id="todo_list_tab" href="#to-do-list" data-toggle="tab"><i class="ion ion-clipboard"></i> <?php echo _('To Do List');?> </a></li>
        <li class="btn-xspull-right"> <a href="#add-to-list" class="btn btn-default btn-xs" data-toggle="tab"><i class="fa fa-plus"></i> <?php echo _('Add new');?></a> </li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">

        <!--   Todo  -->
        <div class="tab-pane active" id="to-do-list">

            <ul class="control-sidebar-menu top20">
                <li>
                    <div class="menu-info">
                        <h4 class="control-sidebar-subheading"><?php echo _('To-Do List');?></h4>
                        <p>
                            <?php echo _('Your To-Do list Task');?>
                        </p>
                    </div>
                </li>
            </ul>

            <ul class="todo-list ui-sortable top20" id="todo_container" style="overflow: hidden;">
            </ul>
        </div>
        <!--  END Todo list -->








 
 
     
<!--  Add new Todo  -->

<div class="tab-pane " id="add-to-list">

    <ul class="control-sidebar-menu top20">
        <li>
            <div class="menu-info">
                <h4 class="control-sidebar-subheading"><?php echo _('Add New To-Do');?></h4>
                <p>
                    <?php echo _('Create a new To-do task');?>
                </p>
            </div>
        </li>
    </ul>

    <div class="box">
        <div class="box-body">

            <form id="form_add_todo">

                <div class="form-group">

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="ti-pin2"></i>
                        </div>
                        <textarea class="form-control pull-right" name="text" placeholder="<?php echo _('To-Do text');?>"></textarea>
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="ti-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right datepicker" name="date" placeholder="<?php echo _('Limit Date');?>">
                    </div>
                    <!-- /.input group -->
                </div>

                <input type="hidden" name="addnew_todo" value="3t0f93j30985">
                <button class="btn btn-default  btn-sm btn-block bg-color-active " type="submit" form="form_add_todo" >
                    <?php echo _('Create a new To-Do');?>
                </button>
            </form>
        </div>
    </div>
</div>
<!--  END Add new Todo  -->
             
                 
                    
                    
                     
                         
                             
                                 
                                         
</div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>


