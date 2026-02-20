
<?php

//namespace App\Controllers;

use App\Lib\Controllers\AbstractController;
use App\Lib\Http\Request;
use App\Lib\Http\Response;

class ApiController extends AbstractController {
    public function process(Request $request): Response {
        return $this->render('', [
            'navbar' => '<div class="flex flex-row w-full h-24 bg-gray-900 items-center justify-center">
                <div class="w-11/12 flex flex-row items-center justify-end space-x-4">
                    <a href="/" class="text-white">Homepage</a>
                    <?php if (isLoggedIn()): ?>
                        <a href="/blogs/new.php" class="text-white">Create post</a>
                        <a href="/profile.php" class="text-white">Profile</a>
                        <a href="/logout.php" class="text-white">Logout</a>
                    <?php else: ?>
                        <a href="/login.php"  class="text-white">Login</a>
                        <a href="/register.php"  class="text-white">Register</a>
                    <?php endif; ?>
                </div>
            </div>',
            'items' => '<div class="flex flex-col w-11/12 items-center justify-start">
                <h1 class="text-4xl">Wonderful blog</h1>

                <div class="flex flex-col w-full items-center justify-start space-y-4">
                    <?php foreach(getPosts() as $post): ?>
                        <div class="flex flex-col w-full items-center justify-start border border-gray-300 p-4">
                            <a href="/blogs/index.php?id=<?= $post["id"] ?>" class="text-2xl"><?= $post["title"] ?></a>
                            <a href="/users.php?id=<?= $post["user_id"] ?>" class="p">By <?= $post["name"] ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="flex flex-row w-full items-center justify-center space-x-4">
                    <?php for ($i = 1; $i <= getPagination()["pagesCount"]; $i++): ?>
                        <?php if($i !== getPage()): ?>
                            <a href="/?page=<?= $i ?>" class="text-xl underline text-gray"><?= $i ?></a>
                        <?php else: ?>
                            <p class="text-2xl font-bold text-black"><?= $i ?></p>
                        <? endif; ?>
                    <?php endfor; ?>
                </div>
            </div>',
        ]);;
    }
}
