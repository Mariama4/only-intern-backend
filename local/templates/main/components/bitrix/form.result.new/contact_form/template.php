<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->addExternalCss("/local/templates/main/components/bitrix/form.result.new/contact_form/assets/css/common.css");
if ($arResult["isFormErrors"] == "Y"):?><?= $arResult["FORM_ERRORS_TEXT"]; ?><? endif; ?>
<?= $arResult["FORM_NOTE"] ?>
<? if ($arResult["isFormNote"] != "Y") {
    ?>
    <div class="contact-form">
        <div class="contact-form__head">
            <div class="contact-form__head-title"><?= isset($arResult['FORM_TITLE']) ? $arResult['FORM_TITLE'] : '' ?></div>
            <div class="contact-form__head-text"><?= isset($arResult['FORM_DESCRIPTION']) ? $arResult['FORM_DESCRIPTION'] : '' ?></div>
        </div>
        <?= str_replace('<form', '<form class="contact-form__form"', $arResult["FORM_HEADER"]) ?>
        <div class="contact-form__form-inputs">
            <?
            foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
            $name = '';
            $notifications = '';
            if ($arQuestion['STRUCTURE'][0]['ID'] == 1) {
                $name = 'medicine_name';
                $notifications = 'Поле должно содержать не менее 3-х символов';
            } elseif ($arQuestion['STRUCTURE'][0]['ID'] == 2) {
                $name = 'medicine_company';
                $notifications = 'Поле должно содержать не менее 3-х символов';
            } elseif ($arQuestion['STRUCTURE'][0]['ID'] == 3) {
                $name = 'medicine_email';
                $notifications = 'Неверный формат почты';
            } elseif ($arQuestion['STRUCTURE'][0]['ID'] == 4) {
                $name = 'medicine_phone';
                $tel = 'data-inputmask="\'mask\': \'+79999999999\', \'clearIncomplete\': \'true\'"';
                $notifications = '';
                $arQuestion["HTML_CODE"] = "<input type='text' class='input__input' name='form_text_4' $tel value='' >";
            } elseif ($arQuestion['STRUCTURE'][0]['ID'] == 5) {
                $name = 'medicine_message';
                $notifications = '';
            };
            //            $arQuestion["HTML_CODE"] = preg_replace('/name="form_text_[0-9]"/', "id='$name' name='$name'", $arQuestion["HTML_CODE"]);
            $arQuestion["HTML_CODE"] = str_replace('class="inputtext"', 'class="input__input"', $arQuestion["HTML_CODE"]);
            if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'text') {
                ?>
                <div class="input contact-form__input">
                    <label class="input__label" for="<?= $name ?>">
                        <div class="input__label-text"><?= isset($arQuestion['CAPTION']) ?
                                $arQuestion["REQUIRED"] == "Y" ?
                                    $arQuestion['CAPTION'] . $arResult["REQUIRED_SIGN"]
                                    : $arQuestion['CAPTION']
                                : '' ?></div>
                        <?= $arQuestion["HTML_CODE"] ?>
                        <div class="input__notification"><?= $name ?></div>
                    </label>
                </div>

            <? } elseif ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'textarea') {
            $arQuestion["HTML_CODE"] = str_replace('class="inputtextarea"', 'class="input__input"', $arQuestion["HTML_CODE"]);
            ?>
        </div>
        <div class="contact-form__form-message">
            <div class="input"><label class="input__label" for="<?= $name ?>">
                    <div class="input__label-text"><?= isset($arQuestion['CAPTION']) ?
                            $arQuestion["REQUIRED"] == "Y" ?
                                $arQuestion['CAPTION'] . $arResult["REQUIRED_SIGN"]
                                : $arQuestion['CAPTION']
                            : '' ?></div>
                    <?= $arQuestion["HTML_CODE"] ?>
                    <div class="input__notification"></div>
                </label></div>
        </div>
    <? };
    } //endwhile
    ?>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
            <input class="form-button contact-form__bottom-button" <?= (intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : ""); ?>
                   type="submit" name="web_form_submit"
                   value="<?= htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]); ?>"/>
        </div>
        </form>
    </div>
    <?
} //endif (isFormNote)
?>