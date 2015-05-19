<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace wh\setting\models;

/**
 * Interface SettingInterface
 * @package wh\setting\models
 *
 * @author Aris Karageorgos <aris@phe.me>
 */
interface SettingInterface
{

    /**
     * Gets all a combined map of all the setting.
     * @return array
     */
    public function getSetting();

    /**
     * Saves a setting
     *
     * @param $section
     * @param $key
     * @param $value
     * @param $type
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function setSetting($section, $key, $value, $type);

    /**
     * Deletes a setting
     *
     * @param $key
     * @param $section
     * @return boolean True on success, false on error
     */
    public function deleteSetting($section, $key);

    /**
     * Deletes all setting! Be careful!
     * @return boolean True on success, false on error
     */
    public function deleteAllSetting();

    /**
     * Activates a setting
     *
     * @param $key
     * @param $section
     * @return boolean True on success, false on error
     */
    public function activateSetting($section, $key);

    /**
     * Deactivates a setting
     *
     * @param $key
     * @param $section
     * @return boolean True on success, false on error
     */
    public function deactivateSetting($section, $key);

}
