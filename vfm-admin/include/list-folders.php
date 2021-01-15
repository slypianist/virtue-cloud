<?php
/**
 * VFM - Virtue-One File Manager Administration
 *
 * PHP version >= 7.3
 *
 * 
 * 
 * @author    Sylvester Umole <sylvester@symoletech.com.ng>
 *
 * 
 */
if (!defined('VFM_APP')) {
    return;
}
/**
* List Folders
*/
if ($gateKeeper->isAccessAllowed()) { ?>
        <section class="vfmblock tableblock ghost ghost-hidden">
            <table class="table" width="100%" id="foldertable">
                <thead>
                    <tr class="rowa two">
                        <td></td>
                        <td class="mini"><span class="sorta nowrap"><i class="fa fa-sort-alpha-asc"></i></span></td>
                        <td class="mini hidden-xs"><span class="sorta nowrap"><i class="fa fa-calendar"></i></span></td>
                        <?php
                        if ($location->editAllowed()) { 
                            // mobile menu
                            if (($setUp->getConfig("download_dir_enable") === true && $gateKeeper->isAllowed('download_enable'))
                                || $gateKeeper->isAllowed('rename_dir_enable')
                                || $gateKeeper->isAllowed('delete_dir_enable')
                            ) { ?>
                            <td class="mini text-right visible-xs">
                            </td>
                                <?php
                            } ?>
                            <?php
                            // download column
                            if ($setUp->getConfig("download_dir_enable") === true && $gateKeeper->isAllowed('download_enable') ) { ?>
                            <td class="mini text-center hidden-xs">
                                <i class="fa fa-download"></i>
                            </td>
                                <?php
                            } ?>
                            <?php
                            // edit column
                            if ($gateKeeper->isAllowed('rename_dir_enable')) { ?>
                            <td class="mini text-center hidden-xs">
                                <i class="fa fa-pencil"></i>
                            </td>
                                <?php
                            } ?>
                            <?php
                            // delete column
                            if ($gateKeeper->isAllowed('delete_dir_enable')) { ?>
                                <td class="mini text-center hidden-xs">
                                    <i class="fa fa-trash-o"></i>
                                </td>
                                <?php
                            } 
                        } ?>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </section>

        <?php
        if ($setUp->getConfig("download_dir_enable") === true && $gateKeeper->isAllowed('download_enable')) { ?>
            <div id="zipmodal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
                <input type="hidden" name="folder_zip_log" value="">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa fa-cloud-download"></i></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body zipicon text-center">
                        <i class="fa fa-folder-o fa-5x"></i>
                        <span class="ziparrow"></span>
                        <i class="fa fa-file-archive-o fa-5x"></i>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center"></div>
                    </div>
                </div>
              </div>
            </div>
            <?php
        } // END if download folders
} // END isAccessAllowed();
