<?php
if (! function_exists('translate_text')) {
    function translate_text($text, $language = null)
    {
        // التحقق إذا كانت القيمة null أو فارغة قبل الترجمة
        if (empty($text)) {
            return ''; // إرجاع نص فارغ بدلاً من null
        }

        // إذا لم يتم تحديد اللغة، سيتم استخدام اللغة الحالية
        $language = $language ?: app()->getLocale();

        // استخدام Google Translate لترجمة النص
        return \Stichoza\GoogleTranslate\GoogleTranslate::trans($text, $language);
    }
}
