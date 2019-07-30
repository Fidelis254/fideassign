<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.explore_cat_sec') }}</h2>
    <switch_button v-model="cat_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="cat_section_display" name="section[0][cat_section_display]">
</div>
@include('back-end.admin.home-page-settings.sections.explore-categories')
<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.start_as_sec') }}</h2>
    <switch_button v-model="home_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="home_section_display" name="section[0][home_section_display]">
</div>
    @include('back-end.admin.home-page-settings.sections.background-image')
    @include('back-end.admin.home-page-settings.sections.start-as')
<div class="wt-tabscontenttitle la-switch-option">
    <h2>{{ trans('lang.download_app_sec_settings') }}</h2>
    <switch_button v-model="app_section_display">{{{ trans('lang.show_on_homepage') }}}</switch_button>
    <input type="hidden" :value="app_section_display" name="section[0][app_section_display]">
</div>
@include('back-end.admin.home-page-settings.sections.download-app')
