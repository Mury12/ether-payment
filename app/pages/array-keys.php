<section id="first-board" class="bg-brand-dark vh-min-100 b-shadow list-me z-2 p-rel pt-5">
    <div class="container p-5" id="wwdo">
        <div class="row">
            <div class="col-12 ml-2 text-center">
                <h2 class="t-orange menu-title">
                    <?= $key ?>
                </h2>
                <div class="divisor bg-brand-light mb-5 mt-3"></div>
                <p class="t-white text-left f-concert-one">
                    Esta página contem
                    <?= $keys ?> das variáveis de
                    <?= $amb ?> que podem ser definidas
                    através do arquivo <code>
                        <?= $file ?></code>, da seguinte forma ao definir uma rota:
                </p>
                <div class="col-4 text-left offset-4">
                    <code>
                        $layout->setEnv([<br/><br/>
                        <span class="ml-5">'key' => 'Silence is golden.',</span><br>
                        <span class="ml-5">'keys' => 'chaves',</span><br>
                        <span class="ml-5">'amb' => 'ambiente',</span><br>
                        <span class="ml-5">'file' => 'config.php'</span><br><br>
                        ])
                    </code>
                </div>
            </div>
        </div>
    </div>
</section>