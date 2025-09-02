<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>استمارة كفالة يتيم</title>

    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            direction: rtl;
            text-align: right;
            line-height: 1.6;
            margin: 30px;
        }

        h2 {
            text-align: center;
            color: #2b542c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        td {
            padding: 5px 10px;
            vertical-align: top;
        }

        .section {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
        }

        .image-box {
            text-align: center;
            margin-top: 10px;
        }

        .image-box img {
            width: 100px;
            height: auto;
            border: 1px solid #aaa;
        }

        .label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <h2>استمارة كفالة يتيم</h2>

    <table>
        <tr>
            <td><span class="label">اسم اليتيم:</span> {{ $orphan->name }}</td>
            <td><span class="label">الرقم الداخلي:</span> {{ $orphan->internal_code }}</td>
        </tr>
        <tr>
            <td><span class="label">اسم الهيئة:</span> {{ $orphan->getFieldValueByDatabaseName('organization_name') }}</td>
            <td><span class="label">رقم الهيئة:</span> {{ $orphan->getFieldValueByDatabaseName('organization_number') }}</td>
        </tr>
        <tr>
            <td><span class="label">تاريخ الميلاد:</span> {{ $orphan->birth_date }}</td>
            <td><span class="label">مكان الميلاد:</span> {{ $orphan->birth_place }}</td>
        </tr>
    </table>

    <div class="section">
        <p><span class="label">اسم الأب:</span> {{ $orphan->getFieldValueByDatabaseName('father_name') }}</p>
        <p><span class="label">اسم الأم:</span> {{ $orphan->profile->mother_name ?? '-' }}</p>
        <p><span class="label">الجنس:</span> {{ $orphan->gender }}</p>
        <p><span class="label">الجنسية:</span> {{ $orphan->getFieldValueByDatabaseName('nationality') }}</p>
        <p><span class="label">المرحلة الدراسية:</span> {{ $orphan->profile->academic_stage ?? '-' }}</p>
    </div>

    <div class="section">
        <p><span class="label">اسم ولي الأمر:</span> {{ $orphan->guardian->guardian_name ?? '-' }}</p>
        <p><span class="label">صلة القرابة:</span> {{ $orphan->guardian->guardian_relationship ?? '-' }}</p>
        <p><span class="label">عنوان اليتيم:</span> {{ $orphan->profile->full_address ?? '-' }}</p>
    </div>

    <div class="image-box">
        <p class="label">صورة اليتيم:</p>
        @if($orphan->image)
            <img src="{{ asset('storage/' . $orphan->image->orphan_image_4_6) }}" alt="صورة اليتيم">
        @else
            <p>لا توجد صورة</p>
        @endif
    </div>

</body>
</html>
