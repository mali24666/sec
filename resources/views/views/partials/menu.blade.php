<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('license_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/lics*") ? "menu-open" : "" }} {{ request()->is("admin/tasks*") ? "menu-open" : "" }} {{ request()->is("admin/esfelts*") ? "menu-open" : "" }} {{ request()->is("admin/closes*") ? "menu-open" : "" }} {{ request()->is("admin/task-statuses*") ? "menu-open" : "" }} {{ request()->is("admin/tasks-calendars*") ? "menu-open" : "" }} {{ request()->is("admin/user-alerts*") ? "menu-open" : "" }} {{ request()->is("admin/contractors*") ? "menu-open" : "" }} {{ request()->is("admin/billcons*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/lics*") ? "active" : "" }} {{ request()->is("admin/tasks*") ? "active" : "" }} {{ request()->is("admin/esfelts*") ? "active" : "" }} {{ request()->is("admin/closes*") ? "active" : "" }} {{ request()->is("admin/task-statuses*") ? "active" : "" }} {{ request()->is("admin/tasks-calendars*") ? "active" : "" }} {{ request()->is("admin/user-alerts*") ? "active" : "" }} {{ request()->is("admin/contractors*") ? "active" : "" }} {{ request()->is("admin/billcons*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.license.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('lic_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lics.index") }}" class="nav-link {{ request()->is("admin/lics") || request()->is("admin/lics/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lic.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.task.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('esfelt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.esfelts.index") }}" class="nav-link {{ request()->is("admin/esfelts") || request()->is("admin/esfelts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.esfelt.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('close_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.closes.index") }}" class="nav-link {{ request()->is("admin/closes") || request()->is("admin/closes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.close.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskStatus.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tasks_calendar_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks-calendars.index") }}" class="nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tasksCalendar.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_alert_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.userAlert.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('contractor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.contractors.index") }}" class="nav-link {{ request()->is("admin/contractors") || request()->is("admin/contractors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bell">

                                        </i>
                                        <p>
                                            {{ trans('cruds.contractor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('billcon_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.billcons.index") }}" class="nav-link {{ request()->is("admin/billcons") || request()->is("admin/billcons/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.billcon.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('electrical_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/stations*") ? "menu-open" : "" }} {{ request()->is("admin/lines*") ? "menu-open" : "" }} {{ request()->is("admin/transeformers*") ? "menu-open" : "" }} {{ request()->is("admin/cbs*") ? "menu-open" : "" }} {{ request()->is("admin/minibllers*") ? "menu-open" : "" }} {{ request()->is("admin/fouses*") ? "menu-open" : "" }} {{ request()->is("admin/boxes*") ? "menu-open" : "" }} {{ request()->is("admin/allnotes*") ? "menu-open" : "" }} {{ request()->is("admin/minibllarnotes*") ? "menu-open" : "" }} {{ request()->is("admin/box-notes*") ? "menu-open" : "" }} {{ request()->is("admin/cables*") ? "menu-open" : "" }} {{ request()->is("admin/bills*") ? "menu-open" : "" }} {{ request()->is("admin/cts*") ? "menu-open" : "" }} {{ request()->is("admin/diagrams*") ? "menu-open" : "" }} {{ request()->is("admin/projects*") ? "menu-open" : "" }} {{ request()->is("admin/rmus*") ? "menu-open" : "" }} {{ request()->is("admin/autoreclosers*") ? "menu-open" : "" }} {{ request()->is("admin/section-lazies*") ? "menu-open" : "" }} {{ request()->is("admin/avrs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/stations*") ? "active" : "" }} {{ request()->is("admin/lines*") ? "active" : "" }} {{ request()->is("admin/transeformers*") ? "active" : "" }} {{ request()->is("admin/cbs*") ? "active" : "" }} {{ request()->is("admin/minibllers*") ? "active" : "" }} {{ request()->is("admin/fouses*") ? "active" : "" }} {{ request()->is("admin/boxes*") ? "active" : "" }} {{ request()->is("admin/allnotes*") ? "active" : "" }} {{ request()->is("admin/minibllarnotes*") ? "active" : "" }} {{ request()->is("admin/box-notes*") ? "active" : "" }} {{ request()->is("admin/cables*") ? "active" : "" }} {{ request()->is("admin/bills*") ? "active" : "" }} {{ request()->is("admin/cts*") ? "active" : "" }} {{ request()->is("admin/diagrams*") ? "active" : "" }} {{ request()->is("admin/projects*") ? "active" : "" }} {{ request()->is("admin/rmus*") ? "active" : "" }} {{ request()->is("admin/autoreclosers*") ? "active" : "" }} {{ request()->is("admin/section-lazies*") ? "active" : "" }} {{ request()->is("admin/avrs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.electrical.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('station_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.stations.index") }}" class="nav-link {{ request()->is("admin/stations") || request()->is("admin/stations/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.station.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('line_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lines.index") }}" class="nav-link {{ request()->is("admin/lines") || request()->is("admin/lines/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.line.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transeformer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transeformers.index") }}" class="nav-link {{ request()->is("admin/transeformers") || request()->is("admin/transeformers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transeformer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cb_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cbs.index") }}" class="nav-link {{ request()->is("admin/cbs") || request()->is("admin/cbs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cb.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('minibller_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.minibllers.index") }}" class="nav-link {{ request()->is("admin/minibllers") || request()->is("admin/minibllers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.minibller.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('fouse_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.fouses.index") }}" class="nav-link {{ request()->is("admin/fouses") || request()->is("admin/fouses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.fouse.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('box_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.boxes.index") }}" class="nav-link {{ request()->is("admin/boxes") || request()->is("admin/boxes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.box.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('allnote_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.allnotes.index") }}" class="nav-link {{ request()->is("admin/allnotes") || request()->is("admin/allnotes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.allnote.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('minibllarnote_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.minibllarnotes.index") }}" class="nav-link {{ request()->is("admin/minibllarnotes") || request()->is("admin/minibllarnotes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.minibllarnote.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('box_note_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.box-notes.index") }}" class="nav-link {{ request()->is("admin/box-notes") || request()->is("admin/box-notes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.boxNote.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('cable_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cables.index") }}" class="nav-link {{ request()->is("admin/cables") || request()->is("admin/cables/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.cable.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('bill_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.bills.index") }}" class="nav-link {{ request()->is("admin/bills") || request()->is("admin/bills/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bill.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ct_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cts.index") }}" class="nav-link {{ request()->is("admin/cts") || request()->is("admin/cts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ct.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('diagram_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.diagrams.index") }}" class="nav-link {{ request()->is("admin/diagrams") || request()->is("admin/diagrams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.diagram.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.project.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rmu_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rmus.index") }}" class="nav-link {{ request()->is("admin/rmus") || request()->is("admin/rmus/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rmu.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('autorecloser_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.autoreclosers.index") }}" class="nav-link {{ request()->is("admin/autoreclosers") || request()->is("admin/autoreclosers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.autorecloser.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('section_lazy_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.section-lazies.index") }}" class="nav-link {{ request()->is("admin/section-lazies") || request()->is("admin/section-lazies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.sectionLazy.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('avr_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.avrs.index") }}" class="nav-link {{ request()->is("admin/avrs") || request()->is("admin/avrs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.avr.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/task-tags*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/task-tags*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-list">

                            </i>
                            <p>
                                {{ trans('cruds.taskManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('task_tag_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-tags.index") }}" class="nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-server">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taskTag.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('emp_and_tool_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/employees*") ? "menu-open" : "" }} {{ request()->is("admin/tools*") ? "menu-open" : "" }} {{ request()->is("admin/custodies*") ? "menu-open" : "" }} {{ request()->is("admin/daily-works*") ? "menu-open" : "" }} {{ request()->is("admin/over-times*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/employees*") ? "active" : "" }} {{ request()->is("admin/tools*") ? "active" : "" }} {{ request()->is("admin/custodies*") ? "active" : "" }} {{ request()->is("admin/daily-works*") ? "active" : "" }} {{ request()->is("admin/over-times*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.empAndTool.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('employee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.employees.index") }}" class="nav-link {{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.employee.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tool_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tools.index") }}" class="nav-link {{ request()->is("admin/tools") || request()->is("admin/tools/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tool.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('custody_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.custodies.index") }}" class="nav-link {{ request()->is("admin/custodies") || request()->is("admin/custodies/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.custody.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('daily_work_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.daily-works.index") }}" class="nav-link {{ request()->is("admin/daily-works") || request()->is("admin/daily-works/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dailyWork.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('over_time_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.over-times.index") }}" class="nav-link {{ request()->is("admin/over-times") || request()->is("admin/over-times/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.overTime.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('all_car_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/cars*") ? "menu-open" : "" }} {{ request()->is("admin/repairs*") ? "menu-open" : "" }} {{ request()->is("admin/car-moves*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/cars*") ? "active" : "" }} {{ request()->is("admin/repairs*") ? "active" : "" }} {{ request()->is("admin/car-moves*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.allCar.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('car_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.cars.index") }}" class="nav-link {{ request()->is("admin/cars") || request()->is("admin/cars/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.car.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('repair_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.repairs.index") }}" class="nav-link {{ request()->is("admin/repairs") || request()->is("admin/repairs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.repair.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('car_move_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.car-moves.index") }}" class="nav-link {{ request()->is("admin/car-moves") || request()->is("admin/car-moves/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.carMove.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('counting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/financials*") ? "menu-open" : "" }} {{ request()->is("admin/all-projects*") ? "menu-open" : "" }} {{ request()->is("admin/financial-orders*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/financials*") ? "active" : "" }} {{ request()->is("admin/all-projects*") ? "active" : "" }} {{ request()->is("admin/financial-orders*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.counting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('financial_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.financials.index") }}" class="nav-link {{ request()->is("admin/financials") || request()->is("admin/financials/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.financial.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('all_project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.all-projects.index") }}" class="nav-link {{ request()->is("admin/all-projects") || request()->is("admin/all-projects/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.allProject.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('financial_order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.financial-orders.index") }}" class="nav-link {{ request()->is("admin/financial-orders") || request()->is("admin/financial-orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.financialOrder.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('sefty_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/courses*") ? "menu-open" : "" }} {{ request()->is("admin/certificates*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/courses*") ? "active" : "" }} {{ request()->is("admin/certificates*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.sefty.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('course_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.course.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('certificate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.certificates.index") }}" class="nav-link {{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.certificate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('room_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.rooms.index") }}" class="nav-link {{ request()->is("admin/rooms") || request()->is("admin/rooms/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.room.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('connection_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/transections*") ? "menu-open" : "" }} {{ request()->is("admin/materia*") ? "menu-open" : "" }} {{ request()->is("admin/scertifcates*") ? "menu-open" : "" }} {{ request()->is("admin/ojoors*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/transections*") ? "active" : "" }} {{ request()->is("admin/materia*") ? "active" : "" }} {{ request()->is("admin/scertifcates*") ? "active" : "" }} {{ request()->is("admin/ojoors*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.connection.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('transection_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transections.index") }}" class="nav-link {{ request()->is("admin/transections") || request()->is("admin/transections/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon table_view">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transection.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('materium_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.materia.index") }}" class="nav-link {{ request()->is("admin/materia") || request()->is("admin/materia/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon table_view">

                                        </i>
                                        <p>
                                            {{ trans('cruds.materium.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('scertifcate_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.scertifcates.index") }}" class="nav-link {{ request()->is("admin/scertifcates") || request()->is("admin/scertifcates/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.scertifcate.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ojoor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ojoors.index") }}" class="nav-link {{ request()->is("admin/ojoors") || request()->is("admin/ojoors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon table_view">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ojoor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>