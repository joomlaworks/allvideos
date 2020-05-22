<?php
/**
 * @version    6.1.0
 * @package    AllVideos (plugin)
 * @author     JoomlaWorks - https://www.joomlaworks.net
 * @copyright  Copyright (c) 2006 - 2020 JoomlaWorks Ltd. All rights reserved.
 * @license    GNU/GPL license: https://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<div class="avPlayerWrapper<?php echo $output->mediaTypeClass; ?>">
    <div class="avPlayerContainer"<?php echo $maxwidth; ?>>
        <div id="<?php echo $output->playerID; ?>" class="avPlayerBlock">
            <?php echo $output->player; ?>
        </div>
        <?php if (($allowVideoDownloading && $output->mediaType == 'video') || ($allowAudioDownloading && $output->mediaType == 'audio')): ?>
        <div class="avDownloadLink">
            <a target="_blank" href="<?php echo $output->source; ?>" download><?php echo JText::_('JW_PLG_AV_DOWNLOAD'); ?></a>
        </div>
        <?php endif; ?>
    </div>
</div>
