<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function block_area($content) {
    echo '<div class="cd-timeline-block">
                <div class="cd-timeline-img cd-area">
                    <img src="' . base_url("assets/timeline/img/cd-icon-area.svg") . '" alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2><b>AREA DE ATUAÇÃO</b></h2>
                    <p>Alterado a area de atuação para ' . $content->grande_area . '</p>
                    <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                    <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->'


    ;
}

function block_atuacao($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-atuacao">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-atuacao.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>ATUAÇÃO</b></h2>
                                        <p>Iniciou atuação na instituição ' . $content->instituicao . ' com vinculo ' . $content->tipo_vinculo . '</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . ' </b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_banca($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-banca">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-banca.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>' . $content->banca . '</b></h2>
                                        <p>' . $content->titulo . '</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_evento($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-evento">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-evento.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>EVENTO</b></h2>
                                        <p>Participação do(a) ' . $content->nome . '</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_formacao($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-formacao">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-formacao.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>FORMAÇÃO ACADEMICA</b></h2>
                                        <p>Obtido formação de nivel ' . $content->nivel . '</p>
                                        <p>Curso: ' . $content->curso . '</p>    
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_orientacao($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-orientacao">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-orientacao.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>ORIENTAÇÃO</b></h2>
                                        <p>Orientação no trabalho ' . $content->titulo . ' </p>
                                        <p>STATUS: ' . $content->status . ' </p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_patente($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-patente">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-patente.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>PATENTE</b></h2>
                                        <p>Registro da patente ' . $content->titulo . '</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_premio($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-premio">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-premio.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>PREMIAÇÃO</b></h2>
                                        <p>Obtido premiação de ' . $content->nome . ' na ' . $content->entidade . '</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}

function block_producao($content) {
    echo '<div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-producao">
                                        <img src="' . base_url("assets/timeline/img/cd-icon-producao.svg") . '" alt="Movie">
                                    </div> <!-- cd-timeline-img -->

                                    <div class="cd-timeline-content">
                                        <h2><b>PRODUÇÃO</b></h2>
                                        <p>'.$content->natureza.' com o titulo de '.$content->titulo.'</p>
                                        <a href="#0" class="cd-read-more">SAIBA MAIS</a>
                                        <span class="cd-date"><b>' . $content->ano_inicial . '</b></span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->'
    ;
}
