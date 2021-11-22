<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<? if(!empty($arResult['ID'])):?>
    <div class="article-card">
        <div class="article-card__title">
            <?=isset($arResult["NAME"]) ? $arResult["NAME"] : ''?>
        </div>
        <div class="article-card__date">
            <?=isset($arResult["DISPLAY_ACTIVE_FROM"]) ? $arResult["DISPLAY_ACTIVE_FROM"] : ''?>
        </div>
        <div class="article-card__content">
            <div class="article-card__image sticky">
                <img src="
                <?=isset($arResult["DETAIL_PICTURE"]["SRC"]) ? $arResult["DETAIL_PICTURE"]["SRC"] : ''?>
                         " alt="" data-object-fit="cover"/>
            </div>
            <div class="article-card__text">
                <div class="block-content" data-anim="anim-3">
                    <?=isset($arResult["DETAIL_TEXT"]) ? $arResult["DETAIL_TEXT"] : ''?>
                </div>
                <a class="article-card__button" href="
                                                      <?=isset($arResult["LIST_PAGE_URL"]) ? $arResult["LIST_PAGE_URL"] : '/'?>
                                                      ">Назад к новостям</a>
            </div>
        </div>
    </div>
<? endif;?>
