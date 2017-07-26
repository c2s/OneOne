<ul class="nav nav-tabs" style="margin-bottom:10px;">
  <li @if($active == 'config') class="active" @endif ><a href="{{ URL::to('admin/module/config/'.$module_name)}}"><i class="icon-info2"></i> Info</a></li>
  <li @if($active == 'sql') class="active" @endif >
  @if(isset($type) && $type =='generic')

  @else
  <a href="{{ URL::to('admin/module/sql/'.$module_name)}}"><i class="icon-database"></i> SQL</a></li>
  <li @if($active == 'table') class="active" @endif >
  <a href="{{ URL::to('admin/module/table/'.$module_name)}}"><i class="icon-table"></i> Table</a></li>
  <li @if($active == 'form' or $active == 'subform') class="active" @endif >
  <a href="{{ URL::to('admin/module/form/'.$module_name)}}"><i class="icon-indent-increase"></i> Form</a></li>
  <li @if($active == 'sub'  ) class="active" @endif >
  <a href="{{ URL::to('admin/module/sub/'.$module_name)}}"><i class="icon-page-break2"></i> Master Detail</a></li>
  @endif
  <li @if($active == 'permission') class="active" @endif >
  <a href="{{ URL::to('admin/module/permission/'.$module_name)}}"><i class="icon-key2"></i> Permission</a></li>
  @if($type =='addon')
  <li @if($active == 'source') class="active" @endif >
  <a href="{{ URL::to('admin/module/source/'.$module_name)}}"><i class="icon-code"></i> source Code </a></li>
  @endif
   <li @if($active == 'rebuild') class="active" @endif >

    @if(isset($type) && $type =='generic')

    @else
   <a href="javascript://ajax" onclick="SximoModal('{{ URL::to('admin/module/build/'.$module_name)}}','Rebuild Module ')"><i class="icon-table"></i> Rebuild</a></li>
   @endif
    <li class="dropdown pull-right">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-table2"></i> Swith Module
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php $md = DB::table('tb_module')->where('module_type','!=','core')->get();
      foreach($md as $m) { ?>
      <li><a href="{{ url('admin/module/'.$active.'/'.$m->module_name)}}"> {{ $m->module_title}}</a></li>
      <?php } ?>
    </ul>
  </li>

  
  
</ul>