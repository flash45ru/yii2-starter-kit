<?php

use yii\db\Migration;

/**
 * Class m190130_155645_add_article_slug_index
 */
class m190130_155645_add_article_slug_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%article}}', 'slug', $this->string(255));
        $this->alterColumn('{{%article_category}}', 'slug', $this->string(255));
        $this->createIndex('idx_article_slug', '{{%article}}', 'slug', true);
        $this->createIndex('idx_article_category_slug', '{{%article_category}}', 'slug', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_article_slug', '{{%article}}');
        $this->dropIndex('idx_article_category_slug', '{{%article_category}}');
        $this->alterColumn('{{%article}}', 'slug', $this->string(1024));
        $this->alterColumn('{{%article_category}}', 'slug', $this->string(1024));
    }
}
