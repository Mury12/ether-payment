        <?php
        /**
         * Aqui é onde as rotas são definidas e retornadas para o layout. Siga as instruções corretamente para que possa
         * definir suas rotas da melhor forma.
         */
        use Model\Layout;

        require_once 'partials/classes/model/Layout.php';

        return [

        '' =>
            $l = new Layout,
                $l->appendTitle('Home', "-")
                ->setPage('web3')
                ->setHeaderTitle($l->getFilePartial('header-logo'))
                ->setHeaderSubTitle($l->getFilePartial('header-ad'))
                ->addJs("web3")
        ,
        //Cada chave carrega uma instância do Layout, contendo as propriedades da página, vistas em app/partials/classes/Layout.php.

        'array-keys'=>
                $l = new Layout,
                $l->appendTitle('Teste', "-")
                ->setPage('array-keys')
                ->setHeaderTitle('Array Keys Content')
                ->setHeaderImage('train.jpg')
                ->setNavbar('list-sections-menu')
                ->setEnv([
                        'key' => 'Silence is golden.',//Torna-se uma variável no escopo global da rota.
                        'keys' => 'chaves',
                        'amb' => 'ambiente',
                        'file' => 'config.php'
                ])
                ->setHeaderSubTitle("The more you talk the less you hear.")
        , //<-- Não esqueça da vírgula separando os elementos ;)

        'cadastro'=>
                $l = new Layout,
                $l->setHeader('cadastro-header')
                ->setNavbar('list-sections-menu')
                ->setHeaderTitle('Cadastre-se')
                ->setHeaderSubTitle('É grátis!')
                ->setHeaderImage('header-img.jpg')
                ->addJs('signup')
                ->showBody(false)
                ->showToBodyButton(false)
                ->permission('not')
        ,

        'admin' =>
                $l = new Layout,
                $l->setPage('admin/home-admin')
                ->setHeaderTitle('Painel de Controle')
                ->setHeaderSubTitle('Crie páginas e rotas!')
                ->addJs('admin-panel')
                ->permission('auth')
        ,
        'api/usr/signup' =>
                $l = new Layout,
                $l->setPage('api/usr/signup')
                ->isApi(true)
        ,
        'api/usr/login' =>
                $l = new Layout,
                $l->setPage('api/usr/login')
                ->isApi(true)
        ,
        'api/usr/alter/ethwallet' =>
                $l = new Layout,
                $l->setPage('api/usr/alter_data')
                ->permission('auth')
                ->isApi(true)
        ,
        'api/usr/get' =>
                $l = new Layout,
                $l->setPage('api/usr/get')
                ->permission('auth')
                ->isApi(true)
        ,
        'api/pages' =>
                $l = new Layout,
                $l->setPage('api/pages')
                ->isApi(true)
        ,
        'api/getUniqId' =>
                $l = new Layout,
                $l->setPage('api/uniqid_gen')
                ->isApi(true)
        ,
        'error/404' =>
                $l = new Layout,
                $l->setPage('errors/404')
        ,

        ];
