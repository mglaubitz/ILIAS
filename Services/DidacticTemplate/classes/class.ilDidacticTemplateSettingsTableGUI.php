<?php
/* Copyright (c) 1998-2009 ILIAS open source, Extended GPL, see docs/LICENSE */

include_once './Services/Table/classes/class.ilTable2GUI.php';

/**
 * Description of ilDidacticTemplateSettingsTableGUI
 *
 * @author Stefan Meyer <meyer@leifos.com>
 * @ingroup ServicesDidacticTemplates
 */
class ilDidacticTemplateSettingsTableGUI extends ilTable2GUI
{

    /**
     * Constructor
     * @param object $a_parent_obj
     * @param string $a_parent_cmd
     */
    public function __construct($a_parent_obj, $a_parent_cmd = "")
    {
        parent::__construct($a_parent_obj, $a_parent_cmd);
        $this->setId('tbl_didactic_tpl_settings');
    }

    /**
     * Init table
     */
    public function init()
    {
        global $ilCtrl, $lng, $ilAccess;

        $this->addColumn('', 'f', '1px');
        $lng->loadLanguageModule('search');
        $lng->loadLanguageModule('meta');
        $this->addColumn($this->lng->txt('search_title_description'), 'title', '30%');
        $this->addColumn($this->lng->txt('didactic_applicable_for'), 'applicable', '20%');
        $this->addColumn($this->lng->txt('didactic_scope'), 'scope', '20%');
        $this->addColumn($this->lng->txt('active'), 'active', '10%');
        $this->addColumn($this->lng->txt('actions'), '', '20%');

        $this->setTitle($this->lng->txt('didactic_available_templates'));

        if ($ilAccess->checkAccess('write', '', $_REQUEST["ref_id"])) {
            $this->addMultiCommand('activateTemplates', $this->lng->txt('activate'));
            $this->addMultiCommand('deactivateTemplates', $this->lng->txt('deactivate'));
            $this->addMultiCommand('confirmDelete', $this->lng->txt('delete'));

            $this->setSelectAllCheckbox('tpls');
        }



        $this->setRowTemplate('tpl.didactic_template_overview_row.html', 'Services/DidacticTemplate');
        $this->setDefaultOrderField('title');
        $this->setDefaultOrderDirection('asc');
        $this->setFormAction($ilCtrl->getFormAction($this->getParentObject()));
    }

    /**
     * Parse didactic templates
     */
    public function parse()
    {
        include_once './Services/DidacticTemplate/classes/class.ilDidacticTemplateSettings.php';
        $tpls = ilDidacticTemplateSettings::getInstance();
        $tpls->readInactive();

        $counter = 0;
        foreach ($tpls->getTemplates() as $tpl) {
            /* @var $tpl ilDidacticTemplateSetting */
            $data[$counter]['id'] = $tpl->getId();
            $data[$counter]['title'] = $tpl->getPresentationTitle();
            $data[$counter]['description'] = $tpl->getPresentationDescription();
            $data[$counter]['info'] = $tpl->getInfo();
            $data[$counter]['enabled'] = (int) $tpl->isEnabled();
            $data[$counter]['assignments'] = $tpl->getAssignments();
            
            $atxt = '';
            foreach ($tpl->getAssignments() as $obj_type) {
                $atxt .= ($this->lng->txt('objs_' . $obj_type) . '<br/>');
            }
            $data[$counter]['applicable'] = $atxt;
            $data[$counter]['automatic_generated'] = $tpl->isAutoGenerated();
            $data[$counter]['scope'] = (array) $tpl->getEffectiveFrom();

            ++$counter;
        }

        $this->setData((array) $data);
    }

    /**
     * Fill row
     * @param array $set
     */
    public function fillRow($set)
    {
        global $ilCtrl, $ilAccess;

        // @TODO: Check for system template and hide checkbox

        if ($ilAccess->checkAccess('write', '', $_REQUEST["ref_id"])) {
            $this->tpl->setVariable('VAL_ID', $set['id']);
        }

        $this->tpl->setVariable('VAL_TITLE', $set['title']);
        $this->tpl->setVariable('VAL_DESC', $set['description']);

        foreach ((array) explode("\n", $set['info']) as $info) {
            $trimmed_info = trim($info);
            if ($trimmed_info) {
                $this->tpl->setCurrentBlock('info');
                $this->tpl->setVariable('VAL_INFO', $trimmed_info);
                $this->tpl->parseCurrentBlock();
            }
        }

        if ($set['automatic_generated']) {
            $this->tpl->setVariable("VAL_AUTOMATIC_GENERATED", $this->lng->txt("didactic_auto_generated"));
        }


        $this->tpl->setVariable(
            'VAL_IMAGE',
            $set['enabled'] ?
            ilUtil::getImagePath('icon_ok.svg') :
            ilUtil::getImagePath('icon_not_ok.svg')
        );
        $this->tpl->setVariable(
            'VAL_ENABLED_TXT',
            $set['enabled'] ?
            $this->lng->txt('active') :
            $this->lng->txt('inactive')
        );


        $atxt = '';
        foreach ((array) $set['assignments'] as $obj_type) {
            $atxt .= ($this->lng->txt('objs_' . $obj_type) . '<br/>');
        }
        $this->tpl->setVariable('VAL_APPLICABLE', $atxt);

        $ilCtrl->setParameterByClass(
            get_class($this->getParentObject()),
            'tplid',
            $set['id']
        );
        
        if (count($set['scope'])) {
            $this->tpl->setCurrentBlock('scope_txt');
            $this->tpl->setVariable('LOCAL_OR_GLOBAL', $this->lng->txt('didactic_scope_list_header'));
            $this->tpl->parseCurrentBlock();
            
            foreach ($set['scope'] as $ref_id) {
                $this->tpl->setCurrentBlock('scope_entry');
                $this->tpl->setVariable('LINK_HREF', ilLink::_getLink($ref_id));
                $this->tpl->setVariable('LINK_NAME', ilObject::_lookupTitle(ilObject::_lookupObjId($ref_id)));
                $this->tpl->parseCurrentBlock();
            }
        } else {
            $this->tpl->setCurrentBlock('scope_txt');
            $this->tpl->setVariable('LOCAL_OR_GLOBAL', $set['local'] ? $this->lng->txt('meta_local') : $this->lng->txt('meta_global'));
            $this->tpl->parseCurrentBlock();
        }
        

        if ($ilAccess->checkAccess('write', '', $_REQUEST["ref_id"])) {
            include_once("./Services/UIComponent/AdvancedSelectionList/classes/class.ilAdvancedSelectionListGUI.php");
            $actions = new ilAdvancedSelectionListGUI();
            $actions->setId($set['id']);
            $actions->setListTitle($this->lng->txt("actions"));
            // Edit
            $actions->addItem(
                $this->lng->txt('settings'),
                '',
                $ilCtrl->getLinkTargetByClass(get_class($this->getParentObject()), 'editTemplate')
            );

            // Copy
            $actions->addItem(
                $this->lng->txt('copy'),
                '',
                $ilCtrl->getLinkTargetByClass(get_class($this->getParentObject()), 'copyTemplate')
            );

            // Export
            $actions->addItem(
                $this->lng->txt('didactic_do_export'),
                '',
                $ilCtrl->getLinkTargetByClass(get_class($this->getParentObject()), 'exportTemplate')
            );
            $this->tpl->setVariable('ACTION_DROPDOWN', $actions->getHTML());
        } else {
            //don't use dropdown if just one item is given ...
            // Export
            $this->tpl->setCurrentBlock('action_link');
            $this->tpl->setVariable(
                'A_LINK',
                $ilCtrl->getLinkTargetByClass(get_class($this->getParentObject()), 'exportTemplate')
            );
            $this->tpl->setVariable('A_TEXT', $this->lng->txt('didactic_do_export'));
            $this->tpl->parseCurrentBlock();
        }
    }
}
