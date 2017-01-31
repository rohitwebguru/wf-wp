<?php 
$aClassFiles = array( 
    "AdminPageFramework"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Form_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/form/AdminPageFramework_Form_admin_page.php", 
    "AdminPageFramework_HelpPane_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_controller/AdminPageFramework_HelpPane_admin_page.php", 
    "AdminPageFramework_Link_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_controller/AdminPageFramework_Link_admin_page.php", 
    "AdminPageFramework_Resource_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_controller/AdminPageFramework_Resource_admin_page.php", 
    "AdminPageFramework_ExportOptions"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/AdminPageFramework_ExportOptions.php", 
    "AdminPageFramework_FormEmail"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/AdminPageFramework_FormEmail.php", 
    "AdminPageFramework_ImportOptions"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/AdminPageFramework_ImportOptions.php", 
    "AdminPageFramework_Property_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/AdminPageFramework_Property_admin_page.php", 
    "AdminPageFramework_Model_Menu__RegisterMenu"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/AdminPageFramework_Model_Menu__RegisterMenu.php", 
    "AdminPageFramework_Model__FormEmailHandler"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/AdminPageFramework_Model__FormEmailHandler.php", 
    "AdminPageFramework_Model__FormRedirectHandler"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/AdminPageFramework_Model__FormRedirectHandler.php", 
    "AdminPageFramework_Model__FormSubmission"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/AdminPageFramework_Model__FormSubmission.php", 
    "AdminPageFramework_Model__FormSubmission__Validator"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__ContactFormConfirm"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__ContactFormConfirm.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Export"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__Export.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Filter"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__Filter.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Link"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__Link.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Redirect"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__Redirect.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__ResetConfirm"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__ResetConfirm.php", 
    "AdminPageFramework_Format_InPageTab"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_InPageTab.php", 
    "AdminPageFramework_Format_InPageTabs"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_InPageTabs.php", 
    "AdminPageFramework_Format_NavigationTab_InPageTab"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_NavigationTab_InPageTab.php", 
    "AdminPageFramework_Format_PageResource_Script"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_PageResource_Script.php", 
    "AdminPageFramework_Format_PageResource_Style"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_PageResource_Style.php", 
    "AdminPageFramework_Format_SubMenuItem"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_SubMenuItem.php", 
    "AdminPageFramework_Format_SubMenuLink"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_SubMenuLink.php", 
    "AdminPageFramework_PageLoadInfo_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_PageLoadInfo_admin_page.php", 
    "AdminPageFramework_View__PageMataBoxRenderer"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageMataBoxRenderer.php", 
    "AdminPageFramework_View__PageMetaboxEnabler"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageMetaboxEnabler.php", 
    "AdminPageFramework_View__PageRenderer"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageRenderer.php", 
    "AdminPageFramework_View__PageRenderer__InPageTabs"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageRenderer__InPageTabs.php", 
    "AdminPageFramework_View__PageRenderer__PageHeadingTabs"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageRenderer__PageHeadingTabs.php", 
    "AdminPageFramework_View__PageRenderer__ScreenIcon"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__PageRenderer__ScreenIcon.php", 
    "AdminPageFramework_View__Resource"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_view/AdminPageFramework_View__Resource.php", 
    "AdminPageFramework_MetaBox"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/AdminPageFramework_MetaBox.php", 
    "AdminPageFramework_Form_post_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/form/AdminPageFramework_Form_post_meta_box.php", 
    "AdminPageFramework_Form_View___CSS_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/form/_view/AdminPageFramework_Form_View___CSS_meta_box.php", 
    "AdminPageFramework_HelpPane_post_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/_controller/AdminPageFramework_HelpPane_post_meta_box.php", 
    "AdminPageFramework_Resource_post_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/_controller/AdminPageFramework_Resource_post_meta_box.php", 
    "AdminPageFramework_MetaBox_Model___PostMeta"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/_model/AdminPageFramework_MetaBox_Model___PostMeta.php", 
    "AdminPageFramework_Property_post_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/_model/AdminPageFramework_Property_post_meta_box.php", 
    "AdminPageFramework_NetworkAdmin"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/AdminPageFramework_NetworkAdmin.php", 
    "AdminPageFramework_Form_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/form/AdminPageFramework_Form_network_admin_page.php", 
    "AdminPageFramework_HelpPane_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/_controller/AdminPageFramework_HelpPane_network_admin_page.php", 
    "AdminPageFramework_Link_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/_controller/AdminPageFramework_Link_network_admin_page.php", 
    "AdminPageFramework_Resource_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/_controller/AdminPageFramework_Resource_network_admin_page.php", 
    "AdminPageFramework_Property_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/_model/AdminPageFramework_Property_network_admin_page.php", 
    "AdminPageFramework_PageLoadInfo_network_admin_page"=> AdminPageFramework_Registry::$sDirPath . "/factory/network_admin_page/_view/AdminPageFramework_PageLoadInfo_network_admin_page.php", 
    "AdminPageFramework_MetaBox_Page"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_MetaBox_Page.php", 
    "AdminPageFramework_PageMetaBox"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_PageMetaBox.php", 
    "AdminPageFramework_Form_page_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/form/AdminPageFramework_Form_page_meta_box.php", 
    "AdminPageFramework_HelpPane_page_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/_controller/AdminPageFramework_HelpPane_page_meta_box.php", 
    "AdminPageFramework_Resource_page_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/_controller/AdminPageFramework_Resource_page_meta_box.php", 
    "AdminPageFramework_Property_page_meta_box"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/_model/AdminPageFramework_Property_page_meta_box.php", 
    "AdminPageFramework_PostType"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/AdminPageFramework_PostType.php", 
    "AdminPageFramework_Form_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/form/AdminPageFramework_Form_post_type.php", 
    "AdminPageFramework_HelpPane_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_controller/AdminPageFramework_HelpPane_post_type.php", 
    "AdminPageFramework_Link_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_controller/AdminPageFramework_Link_post_type.php", 
    "AdminPageFramework_Resource_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_controller/AdminPageFramework_Resource_post_type.php", 
    "AdminPageFramework_PostType_Model__FlushRewriteRules"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_model/AdminPageFramework_PostType_Model__FlushRewriteRules.php", 
    "AdminPageFramework_PostType_Model__SubMenuOrder"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_model/AdminPageFramework_PostType_Model__SubMenuOrder.php", 
    "AdminPageFramework_Property_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_model/AdminPageFramework_Property_post_type.php", 
    "AdminPageFramework_PageLoadInfo_post_type"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/_view/AdminPageFramework_PageLoadInfo_post_type.php", 
    "AdminPageFramework_TaxonomyField"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/AdminPageFramework_TaxonomyField.php", 
    "AdminPageFramework_Form_taxonomy_field"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/form/AdminPageFramework_Form_taxonomy_field.php", 
    "AdminPageFramework_HelpPane_taxonomy_field"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/_controller/AdminPageFramework_HelpPane_taxonomy_field.php", 
    "AdminPageFramework_Resource_taxonomy_field"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/_controller/AdminPageFramework_Resource_taxonomy_field.php", 
    "AdminPageFramework_Property_taxonomy_field"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/_model/AdminPageFramework_Property_taxonomy_field.php", 
    "AdminPageFramework_TermMeta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/AdminPageFramework_TermMeta.php", 
    "AdminPageFramework_Form_term_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/form/AdminPageFramework_Form_term_meta.php", 
    "AdminPageFramework_Form_View___CSS_term_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/form/_view/AdminPageFramework_Form_View___CSS_term_meta.php", 
    "AdminPageFramework_HelpPane_term_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/_controller/AdminPageFramework_HelpPane_term_meta.php", 
    "AdminPageFramework_Resource_term_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/_controller/AdminPageFramework_Resource_term_meta.php", 
    "AdminPageFramework_Property_term_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/_model/AdminPageFramework_Property_term_meta.php", 
    "AdminPageFramework_TermMeta_Model___TermMeta"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/_model/AdminPageFramework_TermMeta_Model___TermMeta.php", 
    "AdminPageFramework_UserMeta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/AdminPageFramework_UserMeta.php", 
    "AdminPageFramework_Form_user_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/form/AdminPageFramework_Form_user_meta.php", 
    "AdminPageFramework_HelpPane_user_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/_controller/AdminPageFramework_HelpPane_user_meta.php", 
    "AdminPageFramework_Resource_user_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/_controller/AdminPageFramework_Resource_user_meta.php", 
    "AdminPageFramework_Property_user_meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/_model/AdminPageFramework_Property_user_meta.php", 
    "AdminPageFramework_UserMeta_Model___UserMeta"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/_model/AdminPageFramework_UserMeta_Model___UserMeta.php", 
    "AdminPageFramework_Widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget.php", 
    "AdminPageFramework_Widget_Factory"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget_Factory.php", 
    "AdminPageFramework_Form_widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/form/AdminPageFramework_Form_widget.php", 
    "AdminPageFramework_Form_View___CSS_widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/form/_view/AdminPageFramework_Form_View___CSS_widget.php", 
    "AdminPageFramework_HelpPane_widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/_controller/AdminPageFramework_HelpPane_widget.php", 
    "AdminPageFramework_Resource_widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/_controller/AdminPageFramework_Resource_widget.php", 
    "AdminPageFramework_Property_widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/_model/AdminPageFramework_Property_widget.php", 
    "AdminPageFramework_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_Form_Meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form_Meta.php", 
    "AdminPageFramework_Form___FieldError"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/error/AdminPageFramework_Form___FieldError.php", 
    "AdminPageFramework_FieldType_color"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_color.php", 
    "AdminPageFramework_FieldType_default"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_default.php", 
    "AdminPageFramework_FieldType_export"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_export.php", 
    "AdminPageFramework_FieldType_file"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_file.php", 
    "AdminPageFramework_FieldType_hidden"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_hidden.php", 
    "AdminPageFramework_FieldType_import"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_import.php", 
    "AdminPageFramework_FieldType_inline_mixed"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_inline_mixed.php", 
    "AdminPageFramework_FieldType_media"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_media.php", 
    "AdminPageFramework_FieldType_number"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_number.php", 
    "AdminPageFramework_FieldType_posttype"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_posttype.php", 
    "AdminPageFramework_FieldType_radio"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_radio.php", 
    "AdminPageFramework_FieldType_section_title"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_section_title.php", 
    "AdminPageFramework_FieldType_size"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_size.php", 
    "AdminPageFramework_FieldType_system"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_system.php", 
    "AdminPageFramework_FieldType_taxonomy"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_taxonomy.php", 
    "AdminPageFramework_FieldType_textarea"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_textarea.php", 
    "AdminPageFramework_WalkerTaxonomyChecklist"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_WalkerTaxonomyChecklist.php", 
    "AdminPageFramework_Input_checkbox"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/input/AdminPageFramework_Input_checkbox.php", 
    "AdminPageFramework_Input_radio"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/input/AdminPageFramework_Input_radio.php", 
    "AdminPageFramework_Input_select"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/input/AdminPageFramework_Input_select.php", 
    "AdminPageFramework_Form___SubmitNotice"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/notice/AdminPageFramework_Form___SubmitNotice.php", 
    "AdminPageFramework_Form_Model___BuiltInFieldTypeDefinitions"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___BuiltInFieldTypeDefinitions.php", 
    "AdminPageFramework_Form_Model___DefaultValues"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___DefaultValues.php", 
    "AdminPageFramework_Form_Model___FieldTypeRegistration"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___FieldTypeRegistration.php", 
    "AdminPageFramework_Form_Model___FieldTypeResource"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___FieldTypeResource.php", 
    "AdminPageFramework_Form_Model___LastInput"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___LastInput.php", 
    "AdminPageFramework_Form_Model___SetFieldResources"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/AdminPageFramework_Form_Model___SetFieldResources.php", 
    "AdminPageFramework_Form_Model___FieldConditioner"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/element_definition/AdminPageFramework_Form_Model___FieldConditioner.php", 
    "AdminPageFramework_Form_Model___FormatDynamicElements"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___FormatDynamicElements.php", 
    "AdminPageFramework_Form_Model___FormatFieldsets"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___FormatFieldsets.php", 
    "AdminPageFramework_Form_Model___FormatSectionset"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___FormatSectionset.php", 
    "AdminPageFramework_Form_Model___FormatSectionsets"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___FormatSectionsets.php", 
    "AdminPageFramework_Form_Model___Format_CollapsibleSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_CollapsibleSection.php", 
    "AdminPageFramework_Form_Model___Format_EachField"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_EachField.php", 
    "AdminPageFramework_Form_Model___Format_EachSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_EachSection.php", 
    "AdminPageFramework_Form_Model___Format_Fields"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_Fields.php", 
    "AdminPageFramework_Form_Model___Format_FieldsetOutput"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_FieldsetOutput.php", 
    "AdminPageFramework_Form_Model___Format_RepeatableField"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_RepeatableField.php", 
    "AdminPageFramework_Form_Model___Modifier_FilterRepeatableElements"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/modifier/AdminPageFramework_Form_Model___Modifier_FilterRepeatableElements.php", 
    "AdminPageFramework_Form_Model___Modifier_SortInput"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/modifier/AdminPageFramework_Form_Model___Modifier_SortInput.php", 
    "AdminPageFramework_Form_View___DebugInfo"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/AdminPageFramework_Form_View___DebugInfo.php", 
    "AdminPageFramework_Form_View___Description"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/AdminPageFramework_Form_View___Description.php", 
    "AdminPageFramework_Form_View___ToolTip"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/AdminPageFramework_Form_View___ToolTip.php", 
    "AdminPageFramework_Form_View___Attribute_Field"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Field.php", 
    "AdminPageFramework_Form_View___Attribute_Fieldrow"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Fieldrow.php", 
    "AdminPageFramework_Form_View___Attribute_Fields"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Fields.php", 
    "AdminPageFramework_Form_View___Attribute_Fieldset"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Fieldset.php", 
    "AdminPageFramework_Form_View___Attribute_SectionTable"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_SectionTable.php", 
    "AdminPageFramework_Form_View___Attribute_SectionTableBody"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_SectionTableBody.php", 
    "AdminPageFramework_Form_View___Attribute_SectionTableContainer"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_SectionTableContainer.php", 
    "AdminPageFramework_Form_View___Attribute_SectionsTablesContainer"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_SectionsTablesContainer.php", 
    "AdminPageFramework_Form_View___CSS_CollapsibleSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_CollapsibleSection.php", 
    "AdminPageFramework_Form_View___CSS_CollapsibleSectionIE"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_CollapsibleSectionIE.php", 
    "AdminPageFramework_Form_View___CSS_Field"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_Field.php", 
    "AdminPageFramework_Form_View___CSS_FieldError"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_FieldError.php", 
    "AdminPageFramework_Form_View___CSS_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_Form.php", 
    "AdminPageFramework_Form_View___CSS_Loading"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_Loading.php", 
    "AdminPageFramework_Form_View___CSS_Section"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_Section.php", 
    "AdminPageFramework_Form_View___CSS_ToolTip"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_ToolTip.php", 
    "AdminPageFramework_Form_View___Fieldset"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/fieldset/AdminPageFramework_Form_View___Fieldset.php", 
    "AdminPageFramework_Form_View___Fieldset___FieldError"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/fieldset/AdminPageFramework_Form_View___Fieldset___FieldError.php", 
    "AdminPageFramework_Form_View___Generate_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/AdminPageFramework_Form_View___Generate_Base.php", 
    "AdminPageFramework_Form_View___Generate_FieldAddress"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldAddress.php", 
    "AdminPageFramework_Form_View___Generate_FieldInputID"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldInputID.php", 
    "AdminPageFramework_Form_View___Generate_FlatFieldInputName"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FlatFieldInputName.php", 
    "AdminPageFramework_Form_View___Generate_SectionName"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/section/AdminPageFramework_Form_View___Generate_SectionName.php", 
    "AdminPageFramework_Form_View__Resource"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/resource/AdminPageFramework_Form_View__Resource.php", 
    "AdminPageFramework_Form_View__Resource__Head"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/resource/AdminPageFramework_Form_View__Resource__Head.php", 
    "AdminPageFramework_Form_View___Script_AttributeUpdator"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_AttributeUpdator.php", 
    "AdminPageFramework_Form_View___Script_CheckboxSelector"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_CheckboxSelector.php", 
    "AdminPageFramework_Form_View___Script_CollapsibleSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_CollapsibleSection.php", 
    "AdminPageFramework_Form_View___Script_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_Form.php", 
    "AdminPageFramework_Form_View___Script_MediaUploader"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_MediaUploader.php", 
    "AdminPageFramework_Form_View___Script_OptionStorage"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_OptionStorage.php", 
    "AdminPageFramework_Form_View___Script_RegisterCallback"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_RegisterCallback.php", 
    "AdminPageFramework_Form_View___Script_RepeatableField"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_RepeatableField.php", 
    "AdminPageFramework_Form_View___Script_RepeatableSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_RepeatableSection.php", 
    "AdminPageFramework_Form_View___Script_SectionTab"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_SectionTab.php", 
    "AdminPageFramework_Form_View___Script_SortableSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_SortableSection.php", 
    "AdminPageFramework_Form_View___Script_Utility"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_Utility.php", 
    "AdminPageFramework_Form_View___Script_Widget"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_Widget.php", 
    "AdminPageFramework_Form_View___CollapsibleSectionTitle"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___CollapsibleSectionTitle.php", 
    "AdminPageFramework_Form_View___FieldTitle"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___FieldTitle.php", 
    "AdminPageFramework_Form_View___FieldsetRow"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___FieldsetRow.php", 
    "AdminPageFramework_Form_View___FieldsetRows"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___FieldsetRows.php", 
    "AdminPageFramework_Form_View___Section"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___Section.php", 
    "AdminPageFramework_Form_View___SectionCaption"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___SectionCaption.php", 
    "AdminPageFramework_Form_View___Sections"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___Sections.php", 
    "AdminPageFramework_Form_View___Sectionsets"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___Sectionsets.php", 
    "AdminPageFramework_Form_View___Format_SectionsetsByTab"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/format/AdminPageFramework_Form_View___Format_SectionsetsByTab.php", 
    "AdminPageFramework_ArrayHandler"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/AdminPageFramework_ArrayHandler.php", 
    "AdminPageFramework_ErrorReporting"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/AdminPageFramework_ErrorReporting.php", 
    "AdminPageFramework_RegisterClasses"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/AdminPageFramework_RegisterClasses.php", 
    "AdminPageFramework_AdminNotice"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/admin_notice/AdminPageFramework_AdminNotice.php", 
    "AdminPageFramework_AdminNotice___Script"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/admin_notice/AdminPageFramework_AdminNotice___Script.php", 
    "AdminPageFramework_Utility"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Debug"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/debug/AdminPageFramework_Debug.php", 
    "AdminPageFramework_WPUtility"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_Factory"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/AdminPageFramework_Factory.php", 
    "AdminPageFramework_HelpPane_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_controller/AdminPageFramework_HelpPane_Base.php", 
    "AdminPageFramework_Link_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_controller/AdminPageFramework_Link_Base.php", 
    "AdminPageFramework_Resource_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_controller/AdminPageFramework_Resource_Base.php", 
    "AdminPageFramework_Factory_Model___Meta_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_model/AdminPageFramework_Factory_Model___Meta_Base.php", 
    "AdminPageFramework_Format_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_model/AdminPageFramework_Format_Base.php", 
    "AdminPageFramework_Message"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_model/AdminPageFramework_Message.php", 
    "AdminPageFramework_Property_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_model/AdminPageFramework_Property_Base.php", 
    "AdminPageFramework_CSS"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_view/AdminPageFramework_CSS.php", 
    "AdminPageFramework_Factory_View__SettingNotice"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_view/AdminPageFramework_Factory_View__SettingNotice.php", 
    "AdminPageFramework_Factory___Script_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_view/AdminPageFramework_Factory___Script_Base.php", 
    "AdminPageFramework_PageLoadInfo_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_view/AdminPageFramework_PageLoadInfo_Base.php", 
    "AdminPageFramework_TabNavigationBar"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/_view/AdminPageFramework_TabNavigationBar.php", 
    "AdminPageFramework_ClassTester"=> AdminPageFramework_Registry::$sDirPath . "/utility/class_tester/AdminPageFramework_ClassTester.php", 
    "AdminPageFramework_PluginBootstrap"=> AdminPageFramework_Registry::$sDirPath . "/utility/plugin_bootstrap/AdminPageFramework_PluginBootstrap.php", 
    "AdminPageFramework_PointerToolTip"=> AdminPageFramework_Registry::$sDirPath . "/utility/pointer_tool_tip/AdminPageFramework_PointerToolTip.php", 
    "AdminPageFramework_WPReadmeParser"=> AdminPageFramework_Registry::$sDirPath . "/utility/readme_parser/AdminPageFramework_WPReadmeParser.php", 
    "AdminPageFramework_Parsedown"=> AdminPageFramework_Registry::$sDirPath . "/utility/readme_parser/library/AdminPageFramework_Parsedown.php", 
    "AdminPageFramework_Requirement"=> AdminPageFramework_Registry::$sDirPath . "/utility/requirement/AdminPageFramework_Requirement.php", 
    "AdminPageFramework_TableOfContents"=> AdminPageFramework_Registry::$sDirPath . "/utility/toc/AdminPageFramework_TableOfContents.php", 
    "AdminPageFramework_Zip"=> AdminPageFramework_Registry::$sDirPath . "/utility/zip/AdminPageFramework_Zip.php", 
    "AdminPageFramework_Registry_Base"=> AdminPageFramework_Registry::$sDirPath . "/admin-page-framework.php", 
    "AdminPageFramework_Registry"=> AdminPageFramework_Registry::$sDirPath . "/admin-page-framework.php", 
    "AdminPageFramework_Bootstrap"=> AdminPageFramework_Registry::$sDirPath . "/admin-page-framework.php", 
    "AdminPageFramework_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Model_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_View_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Controller_Form"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Model_Page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_View_Page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Controller_Page"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Model_Menu"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_View_Menu"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Controller_Menu"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/AdminPageFramework.php", 
    "AdminPageFramework_CustomSubmitFields"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/AdminPageFramework_ExportOptions.php", 
    "AdminPageFramework_Model__FormSubmission_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/AdminPageFramework_Model__FormSubmission.php", 
    "AdminPageFramework_Model__FormSubmission__Validator_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__ContactForm"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__ContactFormConfirm.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Import"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__Export.php", 
    "AdminPageFramework_Model__FormSubmission__Validator__Reset"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/delegate/validaor/AdminPageFramework_Model__FormSubmission__Validator__ResetConfirm.php", 
    "AdminPageFramework_Format_SubMenuPage"=> AdminPageFramework_Registry::$sDirPath . "/factory/admin_page/_model/format/AdminPageFramework_Format_SubMenuLink.php", 
    "AdminPageFramework_MetaBox_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/AdminPageFramework_MetaBox.php", 
    "AdminPageFramework_MetaBox_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/AdminPageFramework_MetaBox.php", 
    "AdminPageFramework_MetaBox_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/AdminPageFramework_MetaBox.php", 
    "AdminPageFramework_MetaBox_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/meta_box/AdminPageFramework_MetaBox.php", 
    "AdminPageFramework_PageMetaBox_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_PageMetaBox.php", 
    "AdminPageFramework_PageMetaBox_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_PageMetaBox.php", 
    "AdminPageFramework_PageMetaBox_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_PageMetaBox.php", 
    "AdminPageFramework_PageMetaBox_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/page_meta_box/AdminPageFramework_PageMetaBox.php", 
    "AdminPageFramework_PostType_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/AdminPageFramework_PostType.php", 
    "AdminPageFramework_PostType_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/AdminPageFramework_PostType.php", 
    "AdminPageFramework_PostType_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/AdminPageFramework_PostType.php", 
    "AdminPageFramework_PostType_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/post_type/AdminPageFramework_PostType.php", 
    "AdminPageFramework_TaxonomyField_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/AdminPageFramework_TaxonomyField.php", 
    "AdminPageFramework_TaxonomyField_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/AdminPageFramework_TaxonomyField.php", 
    "AdminPageFramework_TaxonomyField_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/AdminPageFramework_TaxonomyField.php", 
    "AdminPageFramework_TaxonomyField_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/taxonomy_field/AdminPageFramework_TaxonomyField.php", 
    "AdminPageFramework_TermMeta_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/AdminPageFramework_TermMeta.php", 
    "AdminPageFramework_TermMeta_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/AdminPageFramework_TermMeta.php", 
    "AdminPageFramework_TermMeta_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/AdminPageFramework_TermMeta.php", 
    "AdminPageFramework_TermMeta_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/term_meta/AdminPageFramework_TermMeta.php", 
    "AdminPageFramework_UserMeta_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/AdminPageFramework_UserMeta.php", 
    "AdminPageFramework_UserMeta_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/AdminPageFramework_UserMeta.php", 
    "AdminPageFramework_UserMeta_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/AdminPageFramework_UserMeta.php", 
    "AdminPageFramework_UserMeta_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/user_meta/AdminPageFramework_UserMeta.php", 
    "AdminPageFramework_Widget_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget.php", 
    "AdminPageFramework_Widget_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget.php", 
    "AdminPageFramework_Widget_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget.php", 
    "AdminPageFramework_Widget_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/widget/AdminPageFramework_Widget.php", 
    "AdminPageFramework_Form_Utility"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_Form_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_Form_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_Form_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_Form_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/AdminPageFramework_Form.php", 
    "AdminPageFramework_FieldType_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_color.php", 
    "AdminPageFramework_FieldType"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_color.php", 
    "AdminPageFramework_FieldType_submit"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_export.php", 
    "AdminPageFramework_FieldType_text"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_file.php", 
    "AdminPageFramework_FieldType__nested"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_inline_mixed.php", 
    "AdminPageFramework_FieldType_image"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_media.php", 
    "AdminPageFramework_FieldType_checkbox"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_posttype.php", 
    "AdminPageFramework_FieldType_select"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/field_type/AdminPageFramework_FieldType_size.php", 
    "AdminPageFramework_Input_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/input/AdminPageFramework_Input_checkbox.php", 
    "AdminPageFramework_Form_Model___SectionConditioner"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/element_definition/AdminPageFramework_Form_Model___FieldConditioner.php", 
    "AdminPageFramework_Form_Model___Format_FormField_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_EachField.php", 
    "AdminPageFramework_Form_Model___Format_Fieldset"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_FieldsetOutput.php", 
    "AdminPageFramework_Form_Model___Format_RepeatableSection"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/formatter/AdminPageFramework_Form_Model___Format_RepeatableField.php", 
    "AdminPageFramework_Form_Model___Modifier_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_model/modifier/AdminPageFramework_Form_Model___Modifier_FilterRepeatableElements.php", 
    "AdminPageFramework_Form_View___Attribute_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Field.php", 
    "AdminPageFramework_Form_View___Attribute_FieldContainer_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/attribute/AdminPageFramework_Form_View___Attribute_Field.php", 
    "AdminPageFramework_Form_View___CSS_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/css/AdminPageFramework_Form_View___CSS_CollapsibleSection.php", 
    "AdminPageFramework_Form_View___Fieldset_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/fieldset/AdminPageFramework_Form_View___Fieldset.php", 
    "AdminPageFramework_Form_View___Generate_Field_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldAddress.php", 
    "AdminPageFramework_Form_View___Generate_FieldName"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldAddress.php", 
    "AdminPageFramework_Form_View___Generate_FlatFieldName"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldAddress.php", 
    "AdminPageFramework_Form_View___Generate_FieldTagID"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FieldInputID.php", 
    "AdminPageFramework_Form_View___Generate_FieldInputName"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/field/AdminPageFramework_Form_View___Generate_FlatFieldInputName.php", 
    "AdminPageFramework_Form_View___Generate_Section_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/generator/section/AdminPageFramework_Form_View___Generate_SectionName.php", 
    "AdminPageFramework_Form_View___Script_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_AttributeUpdator.php", 
    "AdminPageFramework_Form_View___Script_SortableField"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/script/AdminPageFramework_Form_View___Script_SortableSection.php", 
    "AdminPageFramework_Form_View___Section_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___CollapsibleSectionTitle.php", 
    "AdminPageFramework_Form_View___SectionTitle"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___CollapsibleSectionTitle.php", 
    "AdminPageFramework_Form_View___FieldsetTableRow"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/form/_view/sectionset/AdminPageFramework_Form_View___FieldsetRow.php", 
    "AdminPageFramework_FrameworkUtility"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/AdminPageFramework_ArrayHandler.php", 
    "AdminPageFramework_Utility_Deprecated"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_VariableType"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_String"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_Array"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_ArrayGetter"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_ArraySetter"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_Path"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_URL"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_File"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_SystemInformation"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Utility_HTMLAttribute"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/base_utility/AdminPageFramework_Utility.php", 
    "AdminPageFramework_Debug_Base"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/debug/AdminPageFramework_Debug.php", 
    "AdminPageFramework_Debug_Log"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/debug/AdminPageFramework_Debug.php", 
    "AdminPageFramework_WPUtility_URL"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_HTML"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_Page"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_Hook"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_File"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_Option"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_Meta"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_SiteInformation"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_WPUtility_SystemInformation"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/utility/wp_utility/AdminPageFramework_WPUtility.php", 
    "AdminPageFramework_Factory_Router"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/AdminPageFramework_Factory.php", 
    "AdminPageFramework_Factory_Model"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/AdminPageFramework_Factory.php", 
    "AdminPageFramework_Factory_View"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/AdminPageFramework_Factory.php", 
    "AdminPageFramework_Factory_Controller"=> AdminPageFramework_Registry::$sDirPath . "/factory/_common/_abstract/AdminPageFramework_Factory.php", 
);
