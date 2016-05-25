<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\rbac\AuthorRule;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        
        $createContent = $auth->createPermission('createContent');
        $createContent->description = 'Create a content';
        $auth->add($createContent);

        
        $updateContent = $auth->createPermission('updateContent');
        $updateContent->description = 'Update content';
        $auth->add($updateContent);

        
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createContent);

       
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updateContent);
        $auth->addChild($admin, $author);

        
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
	
	public function actionAuthorRule()
	{
		$auth = Yii::$app->authManager;

		// add the rule
		$rule = new AuthorRule;
		$auth->add($rule);

		// add the "updateOwnPost" permission and associate the rule with it.
		$updateOwnContent = $auth->createPermission('updateOwnContent');
		$updateOwnContent->description = 'Update own content';
		$updateOwnContent->ruleName = $rule->name;
		$auth->add($updateOwnContent);

		// "updateOwnPost" will be used from "updatePost"
		$updateContent = $auth->getPermission('updateContent');
		$auth->addChild($updateOwnContent, $updateContent);

		// allow "author" to update their own posts
		$author = $auth->getRole('author');
		$auth->addChild($author, $updateOwnContent);
	}
}