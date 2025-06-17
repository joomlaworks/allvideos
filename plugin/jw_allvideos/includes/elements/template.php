<?php
/**
 * @version    7.0
 * @package    AllVideos (plugin)
 * @author     JoomlaWorks - https://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2025 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__) . '/base.php';

class JWElementTemplate extends JWElement
{
    private function listFolders($path)
    {
        $folders       = [];
        $systemFolders = ['__MACOSX', 'node_modules'];
        $di            = new DirectoryIterator($path);
        foreach ($di as $folder) {
            if ($folder->isDir() && !$folder->isDot()) {
                $folderName = $folder->getFilename();
                // Skip hidden and system folders
                if (substr($folderName, 0, 1) !== '.' && !in_array($folderName, $systemFolders)) {
                    $folders[] = $folderName;
                }
            }
        }
        sort($folders);
        return $folders;
    }

    public function fetchElement($name, $value, &$node, $control_name)
    {
        jimport('joomla.filesystem.folder');
        $plgTemplatesPath    = (version_compare(JVERSION, '2.5.0', 'ge')) ? JPATH_SITE . '/plugins/content/jw_allvideos/jw_allvideos/tmpl' : JPATH_SITE . '/plugins/content/jw_allvideos/tmpl';
        $plgTemplatesFolders = $this->listFolders($plgTemplatesPath);
        $db                  = JFactory::getDBO();
        if (version_compare(JVERSION, '2.5.0', 'ge')) {
            $query = "SELECT template FROM #__template_styles WHERE client_id = 0 AND home = '1'";
        } else {
            $query = "SELECT template FROM #__templates_menu WHERE client_id = 0 AND menuid = 0";
        }
        $db->setQuery($query);
        $template     = $db->loadResult();
        $templatePath = JPATH_SITE . '/templates/' . $template . '/html/jw_allvideos';
        if (is_dir($templatePath)) {
            $templateFolders = $this->listFolders($templatePath);
            $folders         = array_merge($templateFolders, $plgTemplatesFolders);
            $folders         = array_unique($folders);
        } else {
            $folders = $plgTemplatesFolders;
        }
        sort($folders);
        $options = [];
        foreach ($folders as $folder) {
            $options[] = JHtml::_('select.option', $folder, $folder);
        }
        $fieldName = version_compare(JVERSION, '2.5.0', 'ge') ? $name : $control_name . '[' . $name . ']';

        if (version_compare(JVERSION, '4', 'ge')) {
            $attributes = 'class="custom-select" style="max-width:300px;"';
        } else {
            $attributes = '';
        }

        return JHtml::_('select.genericlist', $options, $fieldName, $attributes, 'value', 'text', $value);
    }
}

class JFormFieldTemplate extends JWElementTemplate
{
    public $type = 'template';
}

class JElementTemplate extends JWElementTemplate
{
    public $_name = 'template';
}
