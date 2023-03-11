<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

namespace BcThemeFile\Model\Table;

use BaserCore\Model\Table\AppTable;
use Cake\Validation\Validator;

/**
 * Class ThemeFile
 *
 * テーマファイルモデル
 */
class ThemeFilesTable extends AppTable
{

    /**
     * Initialize
     *
     * @param array $config
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->setTable('');
    }

}
