<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

//echo "<pre>"; print_r($arResult); echo "</pre>";
?>

<ul>
    <?foreach($arResult['ITEMS'] as $arItem):?>
        <li class="parent_list" id=<?=$arItem['ID']?> onclick="openclose(<?=$arItem['ID']?>)"><?=$arItem['SECTION_NAME']?>
            <?if(count($arItem['VACANCIES']) > 0):?>
                <ul class="under_list">
                    <?foreach($arItem['VACANCIES'] as $vacItem):?>
                        <?
                        $this->AddEditAction($vacItem['ID'], $vacItem['EDIT_LINK'], CIBlock::GetArrayByID($vacItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($vacItem['ID'], $vacItem['DELETE_LINK'], CIBlock::GetArrayByID($vacItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <li id="<?=$this->GetEditAreaId($vacItem['ID']);?>"><a href="<?=$vacItem['DETAIL_PAGE_URL']?>"><?=$vacItem['NAME']?></a></li>
                    <?endforeach;?>
                </ul>
            <?endif;?>
        </li>
    <?endforeach;?>
</ul>

<script>
    function openclose(id){
        let el = document.getElementById(id).firstElementChild;
        el.classList.toggle('height');
    }
</script>