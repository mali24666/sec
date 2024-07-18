<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('license_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.license.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('lic_access')
                            <li class="{{ request()->is("admin/lics") || request()->is("admin/lics/*") ? "active" : "" }}">
                                <a href="{{ route("admin.lics.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.lic.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.task.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('esfelt_access')
                            <li class="{{ request()->is("admin/esfelts") || request()->is("admin/esfelts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.esfelts.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.esfelt.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('close_access')
                            <li class="{{ request()->is("admin/closes") || request()->is("admin/closes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.closes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.close.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_status_access')
                            <li class="{{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="{{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks-calendars.index") }}">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.tasksCalendar.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_alert_access')
                            <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-alerts.index") }}">
                                    <i class="fa-fw fas fa-bell">

                                    </i>
                                    <span>{{ trans('cruds.userAlert.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('electrical_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>Electrical supply  project </span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('station_access')
                            <li class="{{ request()->is("admin/stations") || request()->is("admin/stations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.stations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.station.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('line_access')
                            <li class="{{ request()->is("admin/lines") || request()->is("admin/lines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.lines.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.line.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transeformer_access')
                            <li class="{{ request()->is("admin/transeformers") || request()->is("admin/transeformers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transeformers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.transeformer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('cb_access')
                            <li class="{{ request()->is("admin/cbs") || request()->is("admin/cbs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cbs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.cb.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('minibller_access')
                            <li class="{{ request()->is("admin/minibllers") || request()->is("admin/minibllers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.minibllers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.minibller.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('fouse_access')
                            <li class="{{ request()->is("admin/fouses") || request()->is("admin/fouses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.fouses.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.fouse.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('box_access')
                            <li class="{{ request()->is("admin/boxes") || request()->is("admin/boxes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.boxes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.box.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('allnote_access')
                            <li class="{{ request()->is("admin/allnotes") || request()->is("admin/allnotes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.allnotes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>transformer notes</span>

                                </a>
                            </li>
                        @endcan
                        @can('minibllarnote_access')
                            <li class="{{ request()->is("admin/minibllarnotes") || request()->is("admin/minibllarnotes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.minibllarnotes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.minibllarnote.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('box_note_access')
                            <li class="{{ request()->is("admin/box-notes") || request()->is("admin/box-notes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.box-notes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.boxNote.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('cable_access')
                            <li class="{{ request()->is("admin/cables") || request()->is("admin/cables/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cables.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.cable.title') }}</span>

                                </a>
                            </li>
                        @endcan
                          @can('city_access')
                            <li class="{{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cities.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.city.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ct_access')
                            <li class="{{ request()->is("admin/cts") || request()->is("admin/cts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cts.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.ct.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('diagram_access')
                            <li class="{{ request()->is("admin/diagrams") || request()->is("admin/diagrams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.diagrams.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.diagram.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('project_access')
                            <li class="{{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                <a href="{{ route("admin.projects.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.project.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('rmu_access')
                            <li class="{{ request()->is("admin/rmus") || request()->is("admin/rmus/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rmus.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.rmu.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('boxes_detail_access')
                            <li class="{{ request()->is("admin/boxes-details") || request()->is("admin/boxes-details/*") ? "active" : "" }}">
                                <a href="{{ route("admin.boxes-details.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.boxesDetail.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('task_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span>{{ trans('cruds.taskManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('task_tag_access')
                            <li class="{{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-tags.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('emp_and_tool_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.empAndTool.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('employee_access')
                            <li class="{{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                <a href="{{ route("admin.employees.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.employee.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tool_access')
                            <li class="{{ request()->is("admin/tools") || request()->is("admin/tools/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tools.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tool.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('custody_access')
                            <li class="{{ request()->is("admin/custodies") || request()->is("admin/custodies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.custodies.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.custody.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('all_car_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.allCar.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('car_access')
                            <li class="{{ request()->is("admin/cars") || request()->is("admin/cars/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cars.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.car.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('repair_access')
                            <li class="{{ request()->is("admin/repairs") || request()->is("admin/repairs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.repairs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.repair.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('car_move_access')
                            <li class="{{ request()->is("admin/car-moves") || request()->is("admin/car-moves/*") ? "active" : "" }}">
                                <a href="{{ route("admin.car-moves.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.carMove.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('sefty_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.sefty.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('course_access')
                            <li class="{{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.courses.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.course.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('certificate_access')
                            <li class="{{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "active" : "" }}">
                                <a href="{{ route("admin.certificates.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.certificate.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>