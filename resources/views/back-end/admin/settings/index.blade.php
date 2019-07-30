@extends('back-end.master')
@section('content')
    <div class="wt-haslayout wt-manage-account wt-dbsectionspace la-admin-setting" id="settings">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @elseif (Session::has('error'))
            <div class="flash_msg">
                <flash_messages :message_class="'danger'" :time ='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 float-left">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    <div class="wt-dashboardtabs">
                        <ul class="wt-tabstitle nav navbar-nav">
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-general'? 'active': '' }}}" data-toggle="tab" href="#wt-general">{{ trans('lang.general_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-email'? 'active': '' }}}" data-toggle="tab" href="#wt-email">{{ trans('lang.email_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-payment'? 'active': '' }}}" data-toggle="tab" href="#wt-payment">{{ trans('lang.payment_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-footer'? 'active': '' }}}" data-toggle="tab" href="#wt-footer">{{ trans('lang.footer_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-register'? 'active': '' }}}" data-toggle="tab" href="#wt-register">{{ trans('lang.register_form_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-icons'? 'active': '' }}}" data-toggle="tab" href="#wt-icons">{{ trans('lang.dashboard_icons') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-demo'? 'active': '' }}}" data-toggle="tab" href="#wt-demo">{{ trans('lang.demo_content') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-clear-cache'? 'active': '' }}}" data-toggle="tab" href="#wt-clear-cache">{{ trans('lang.menu_clear_cache') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-inner-pages'? 'active': '' }}}" data-toggle="tab" href="#wt-inner-pages">{{ trans('lang.inner_page_settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-import-updates'? 'active': '' }}}" data-toggle="tab" href="#wt-import-updates">{{ trans('lang.import_updates') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="{{{ \Request::route()->getName()==='settings/#wt-access-type'? 'active': '' }}}" data-toggle="tab" href="#wt-access-types">{{ trans('lang.site_access_type') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-securityhold tab-pane active la-general-setting" id="wt-general">
                            @include('back-end.admin.settings.general.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-email-setting" id="wt-email">
                            @include('back-end.admin.settings.email.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-payment-setting" id="wt-payment">
                            @include('back-end.admin.settings.payment.mpesa-settings')
                            @include('back-end.admin.settings.payment.commision-settings')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-footer">
                            @include('back-end.admin.settings.footer.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-register">
                            @include('back-end.admin.settings.register.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-icons">
                            @include('back-end.admin.settings.icon.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-demo">
                            @include('back-end.admin.settings.demo-content.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-clear-cache">
                            @include('back-end.admin.settings.clear-cache.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-inner-pages">
                            @include('back-end.admin.settings.inner-pages.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-import-updates">
                            @include('back-end.admin.settings.updates.index')
                        </div>
                        <div class="wt-securityhold tab-pane la-footer-setting" id="wt-access-types">
                            @include('back-end.admin.settings.site-access-type.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
