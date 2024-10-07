<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$docs_exchange = null;
$docs_exchange = docs_exchange_list();

// https://stackoverflow.com/questions/1307022/save-a-pdf-created-with-fpdf-php-library-in-a-mysql-blob-field
//$base64 = 'eyJmYWN0dXgiOnsidmVyc2lvbiI6MSwidXJsIjoiZmFjdHV4LmJlIiwiZGF0ZSI6IjIwMjMtMTAtMDgiLCJ0aW1lIjoiMTg6MDQ6NDgiLCJuZXR3b3JrIjp7ImRvYyI6Imludm9pY2VzIiwiaWQiOiJCRTA4NzcwOTMyMDJJTlYyIiwic2VuZGVyIjoiQkUwODc3MDkzMjAyIiwicmVjaXZlciI6IkJFMTIzNDU2Nzg5IiwiY2xvdWQiOmZhbHNlfX0sImRvY3VtZW50Ijp7ImNvbnRyb2xsZXIiOiJpbnZvaWNlcyIsImlkIjoyLCJidWRnZXRfaWQiOm51bGwsImNyZWRpdF9ub3RlX2lkIjpudWxsLCJ0aXRsZSI6IkZhY3R1cmEgYW51YWwiLCJzZWxsZXJfaWQiOm51bGwsImRhdGUiOiIyMDIzLTEwLTA3IiwiZGF0ZV9leHBpcmF0aW9uIjoiMjAyMy0xMC0yMiIsInRvdGFsIjoyMDQsInRheCI6NDIuODQsImFkdmFuY2UiOm51bGwsImNvbW1lbnRzIjpudWxsLCJyMSI6bnVsbCwicjIiOm51bGwsInIzIjpudWxsLCJjZSI6IisrKzAwMFwvMDAyMFwvMjMyNTYrKysiLCJjb2RlIjoiMjAyMzEwMDcwNTQ2Mzk2NTIxN2Q1ZjU3ZGJkMjgzNyIsInR5cGUiOiJJIiwic3RhdHVzIjoxMH0sInJlY2l2ZXIiOnsiY2xpZW50X2lkIjo2MDQzMCwidGl0bGUiOm51bGwsIm5hbWUiOiJQYXRyaWNpYSBDYWRhdmlkIiwibGFzdG5hbWUiOm51bGwsInZhdCI6IkJFMTIzNDU2Nzg5IiwibGFuZ3VhZ2UiOiJlbl9HQiIsImFkZHJlc3NlcyI6eyJCaWxsaW5nIjp7ImFkZHJlc3MiOiJSdWUgZGUgbGEgYmFpZ25vaXJlIiwibnVtYmVyIjoiSDJPIiwicG9zdGNvZGUiOiIxMDUwIiwibmVpZ2hib3Job29kIjoiSXhlbGxlcyIsInNlY3RvciI6bnVsbCwicmVmIjoiQnJ1eGVsbGVzIiwiY2l0eSI6IkJydXhlbGxlcyIsInByb3ZpbmNlIjoiQnJ1eGVsbGVzIiwicmVnaW9uIjoiUmVnaW9uIiwiY291bnRyeSI6IkJFIn0sIkRlbGl2ZXJ5Ijp7ImFkZHJlc3MiOiJSdWUgZGUgbGEgYmFpZ25vaXJlIiwibnVtYmVyIjoiSDJPIiwicG9zdGNvZGUiOiIxMDUwIiwibmVpZ2hib3Job29kIjoiSXhlbGxlcyIsInNlY3RvciI6bnVsbCwicmVmIjoiQnJ1eGVsbGVzIiwiY2l0eSI6IkJydXhlbGxlcyIsInByb3ZpbmNlIjoiQnJ1eGVsbGVzIiwicmVnaW9uIjoiUmVnaW9uIiwiY291bnRyeSI6IkJFIn19fSwic2VuZGVyIjp7Im5hbWUiOiJyb2JpbnNvbiBjb2VsbG8gRmFjdHV4LmJlIiwidmF0IjoiQkUwODc3MDkzMjAyIiwibGFuZ3VhZ2UiOiJlbl9HQiIsImFkZHJlc3NlcyI6eyJCaWxsaW5nIjp7ImFkZHJlc3MiOiJBViBERSBMQSBMSUJFUlRFIiwibnVtYmVyIjoiMjA4IiwicG9zdGNvZGUiOiIxMDgxIiwibmVpZ2hib3Job29kIjoiS09FS0VMQkVSRyIsInNlY3RvciI6bnVsbCwicmVmIjoiQlJVWEVMTEVTIiwiY2l0eSI6IkJSVVhFTExFUyIsInByb3ZpbmNlIjoiQlJVWEVMTEVTIiwicmVnaW9uIjoiTlVMTCIsImNvdW50cnkiOiJCRSJ9fSwiYmFuayI6eyJuYW1lIjoiSU5HIiwiYWNjb3VudF9udW1iZXIiOiJCRTE1IDM2MzIgMzUxMCA3NjMwIiwiYmljIjoiQklDIElORyIsImliYW4iOiIifSwiZGlyZWN0b3J5Ijp7IkVtYWlsIjoicm9lbmNvc2FAZ21haWwuY29tIiwiV2ViIjpmYWxzZSwiR1NNIjpmYWxzZSwiVGVsIjpmYWxzZSwiRmFjZWJvb2siOmZhbHNlLCJUZWwzIjpmYWxzZSwiVGVsMiI6ZmFsc2UsIkZheCI6ZmFsc2UsIkVtYWlsLXNlY3VyZSI6ZmFsc2UsIm5hdGlvbmFsTnVtYmVyIjpmYWxzZX19LCJsaW5lcyI6eyIxIjp7ImNvZGUiOm51bGwsInF1YW50aXR5IjoxMiwiZGVzY3JpcHRpb24iOiJzaXN0ZW1hIGRlIGZhY3R1cmFjaW9uIiwicHJpY2UiOjE3LCJkaXNjb3VudHMiOjAsImRpc2NvdW50c19tb2RlIjoiJSIsInRheCI6MjEsInN1YnRvdGFsIjoyMDQsInRvdGFsZGlzY291bnRzIjowLCJ0b3RhbHRheCI6NDIuODQsInRvdGFsIjoyNDYuODR9fSwidG90YWxzIjp7IjIxIjp7Iml0ZW1zIjoxMiwidG90YWwiOjIwNCwiZGlzY291bnRzIjowLCJ0YXhhYmxlX2Jhc2UiOjIwNCwiJXZhdCI6MjEsInRvdGFsX3R2YSI6NDIuODR9LCIxMiI6eyJpdGVtcyI6MCwidG90YWwiOjAsImRpc2NvdW50cyI6MCwidGF4YWJsZV9iYXNlIjowLCIldmF0IjoxMiwidG90YWxfdHZhIjowfSwiNiI6eyJpdGVtcyI6MCwidG90YWwiOjAsImRpc2NvdW50cyI6MCwidGF4YWJsZV9iYXNlIjowLCIldmF0Ijo2LCJ0b3RhbF90dmEiOjB9LCIwIjp7Iml0ZW1zIjowLCJ0b3RhbCI6MCwiZGlzY291bnRzIjowLCJ0YXhhYmxlX2Jhc2UiOjAsIiV2YXQiOjAsInRvdGFsX3R2YSI6MH19fQ==';
$base64 = '%PDF-1.3
3 0 obj
<</Type /Page
/Parent 1 0 R
/Resources 2 0 R
/Contents 4 0 R>>
endobj
4 0 obj
<</Filter /FlateDecode /Length 4908>>
stream
x�͝�v���|
l|�}lB
�?W�;Q�c+��Y���2    9��d�䝲�#���n��.I��9ِ?���ut����pR��w�N��r�>.���ܫ��g����.}����~h��ۓ8�o]��M5��uC�عWo܇߾���;ߺX�ڝ�Ե���{����I������W!
W�F����z���w/ۋ�íq��7N|Ӹ~}�8��t_�lݛ��ظכ���aw�}���.���}�C(ㅪ��˟�5m|�A���颺ԩ)���^����ތ��\\�t�[�������??\\>ٍ
��]_�Q�bݴ]�����^��{^C|]����r    �MB:?����}�����뛫Mi?�]È]�[I͕V��SV
�i+_�"�O��&)�i�ם�Z$CH����I���+���ۋ����~d������7����UC�Wc�|��C���uC��P�v}�}�y���h}�c�+�L�I�Yu���t�&�a�5u�������Y�_�2�Ϸ��`���=��C�ͱ�7on�wo6o��<ߵˡ����^�X�T4����#5i����H�~���O���������7�wN��6� ���g��:��\'ASt{�pZuOv��y����ꉢ7iEn�e�����7_ԏ,�_��N��:]g=�vp�麓m_���th��S�s+�!��Ê�\\��ҵ]��z9����l���a1�0�>��?��嶺MM�mt�IC)�U�hݾ�hi�u��ʖV�or3�i
�^l�׏�Հ!��a5�O�oҿo����ZN��ϯv?X;�_r�W�����M^�4˱�K��y����iϲ��{�%\\
hLp�S15��:����i1�W������o=�����2������R�t���直n=���<�㚧9&�^�u����9~��O1��p��V<�Q�>����J�/�����z�4�n\\�n�-�\\�d�1[�j�m*�������]w<�P���d.q��|h���N��69c/��*Gs斫�#r���|�E�M���SA{�qr�8��k=�&�C����qHZ��|��
�>��6�Cu�7E��n5����u7��6q�|�#V>�yĦ}��h�1�t��;���xm�}�/�6��Av1�=}�a|�����q��:�/�mF_�D�<#.���٫V�Ov������8�j
�y�5�dW秨��T��̭�L��ђ����ҩ�=�8���T3�m2a-�y��,In*��6�C(�y��7K�Ǜ
=��FDI�#Ғ����h�1�$�U�o*��l�$�a%��e}�䁧�h���&�Ǭʻkr���������FMvM~�4�d��)��T��̭�l"�Ii*0�
�s����LE�=�&֚�g�6M�qM�pS͠���BM.nQ�6b�5��M��f#�&��j�G�jF{�M�Ԛ�Wy��TT.h��L�#v��/Iw*A�6YKrq�}���%9w~��o��Q
��K[j`�И�x�~���}�󓽦is6�h����s~s�t�P�>4���]��u�Ø��=,Z�/QV���{�W����B�U_
l�|����.8�w��O��ۣ��Q��d9����Nc����MW�u�nq�|xh�۶�/<y^ ��<��|>��Y8��8��;�U�X/J�$V���w,�+Z��Jf
�6    ��Rg���n�r�.m�N�Tǻ�Bр�f�!a0���R4��I�&ݿzu�u��p��)�s<u������J�<B�/��SZ�|bhB�o�cyh(m�Xi3ՄU�U6�b��A©8X��fq�pu2�q���R����As��
��p�&���-�)��Z    �2�pk%�ʘ{����ʨ�>�5CUF����(CC�McA�X�2�p�f�T,�Z    �2X8U�V¤n�>�p�%��6���`�[a�"�Z�0=NVJ��1��F.��\'Bi��a,cYáM�A4�Z�0H8��[a\'�X�3�1E�6�a�ɭ�0c��,����J    ��[d�Q�M�d��H�g,B�}��©*�p�*{�;�V��f�d��{��eϰ��3<,Z�6�iϿ�}y)J�8yS�=n]/6��7ۋ����΢�k�Ymm�?�T�������.8]f\\�N��0_�_^O=��\\V�c^�������x�2�y�uyQ�ʷz�y����q���c}�aȧ�żog����/��' . "\0" . '�:�7lj�q,�J�?�c�^��[�|��c���g.}=?���r�>q���n����۫3WU��Ɉ�~?q�_�8�_��>��ӧN凋7���=�}�����~��ڋ��8
!?�:��$r��1���|�-��7����zw؟��?�8�}VU�z�����c�?���ef�����6�`�)N�=ݍ���gW�.�ǆ���7������Ǐ��)-o�M�U8-%��ˏ�(-���8B�*d����/�
��)m�N���+uJ��(�Ѻ�;��_m�&���|�Ү|R��1/���;�6�䩮��車gߦC-�\'ڰ�|�#�ea\'����П�!�Fg4���<���*�P�M됽�R�P�ʦ�A�^i�C�6U� �A(�aS�>�C����
BS~i��Ul��ՌB6Um�T�O(�kSuB���l��!��t�C(�è(�QQ�pFEW�B96Um0*�¨�
�X�];�J�+FEW�BW���]
]1�@We�NueS����ЕM�9�b�a��W�Tɦ�b��)vA�Bu6�.�Q��PY��Z�(4iS�$��$�ФMU�Du�d�U�MՑ��l��!�1�B�f�BW���l�U�Q��M�J2
��T��P��P�Φ�
;��r�=�r.cnfSu3B�f�ʹ��A��P��b    �bm�NH(k�I��Bu6U7#�����P��MUW�BW6ŉ�Qx��:B�u6ŉ�Q������I    �+��#1*�%�eT<�P�P���_r��}��
�}F��    E�3*�ϨT7�C𑏋�gT�ό�3��!T����r�ՊQ�ʦ�+�b�!�.��g�ͨ�/��P��.�_Q�
��TUG��)��6L:e�Pq~F�_B�_�b�(�oS�    Ug��f�Pd�Pq��۔�l,��"����0*�gT<�Ph�P��߰�j�P��ʮ�P��J���3*�\'�Ϩ��,��F���:�
�j�    E�m��%T�B5��ʺ`S�
BQ݌B6��P�����M�h+͂M�B    E��+;�ȂM5&��3��ABş    ��;7FeufT��ju*�Ψ��    U���\'T��PuB�I�:8C̟o�����PԾMս    ����}�ꎂQh�PhҦ�30
�
W�)v�B�6UM�TWB�:B�:������RI|�B(TǨx�8�0*�dT��Ph�QѤMU����2*�%�">ɨ�P8!��:F�        �r�bʑU���G��r���p3F�+����rL:iæ�_�j~m�9"9��f��"�ߴ���$��#Be?�(jߦ�ABQ����m��%�o�)����m��Q9���M���)�Q(Ǧ��0*k
��:�+�.��w��ΤS�*�B5G�ʮ�QT�M�+`��־M��;)�9�_��j�P� �⢄���ԠM���}fT�Px,�Re�b
eT��P���:"uD�$�f�Ͽq���poFe�eT��P���τ�r���>�R������l��"T��PT7�ЕMUW��3���[9����Qh�Px�MU6Um�t�
�jm�$�@(�kS�
B�_Beu&�3��>���bW�(�c�HW��?�LueSU�M�U�=!���*�zF�9&�����b��(�P�٦�o0
�
��T��P�٦�W�B�6UM]�:�nJ�y���0*�bT��P�QѕMUW��JǨ��P�Q��P��F�\'    �O2*�bT|�P��QqQFE��B���O��b�o�d.ʨ�(�X��%Tk�Pq`FQ)��Rl
fudҩRE���(*Ŧ�g���    �bm��"�"ڀ�ʯ֥�"��)���cm��"�"���*�Px�I\'�*�IBU9�ʳF�6���(�P80�P�MU��    ��m�K(<�P٩��B(*��Z����Z��z�MU��    M:��X�m��$nfSU�P�P�Mu�%�\'�\'9�Vc�e�Pd�Qq3B�_F�����.��u6U7cT܌Q��p3B�
FE��#
GbTN"�Bu��7�`����|�T6��*��M�,*�ͨ�8�½    �{�wҾ"�WM6Z�6�
%jS�2�jL:���#��EE��J�����Be�fٷ������팊���"J�����IF���*�FQ�&�u�P����3�TK(4iSU�MU�"�6���wR�8�8���
(-�è�q(-�Di9YSZ��QQ,��+J����1*�`TVgF%��WaT�Ai�
J�rߠ��j���_����8�ȠIQ�������"�6��TsdS�τ�>�wC�s�kπ
��V(��PB�A�j
*܋Ѳj0�� �kR�7秴��秴�U(-���W��#��U(���T�*�Bτ�Ul�z&�������z���P�P�٦�gB�X�N�B(TgSՕMU�B�B�B6���T݌Pd��W�?����TE���3*�\'�\'TN@��_�Tw�B��zD(<�P(�P�>���`Tj�Ph�Q��>�!�|�eЦ�AB��@    ��&T�O��G6��oS�>�ȾM5�6�30*���8��B�7���wR���_�zL��(|æ���7�s
�ФMU�6U]�Tw���>�P�dŊè�U�3��+B�+������_
�����P�I�\'��o��_���b�ߌ����Wۭ��_�?s�޽������_oݙ׿a���O7�E�/7o�.<�դjO4�ٸ��3���n�^��Ŧo���Ʂ�Y����:�í��y��v�4h
endstream
endobj
1 0 obj
<</Type /Pages
/Kids [3 0 R ]
/Count 1
/MediaBox [0 0 595.28 841.89]
>>
endobj
5 0 obj
<</Filter /FlateDecode /Length 364>>
stream
x�]R�n�0��>��L�%�DI�8���~' . "\0" . '�%E*r�ﻻvҪHX�gvVk?/���Ῑ��`]�[�x5
�3\\z��P�}����PO���j�Jݍ^���x6/f�����������|���4}�' . "\0" . 'z�����}���@�,ۖ-��˺E�u�^�,���<�
�Z_�K� IQ����Yd����C�K�_�%q�8>�!J"V!2&bGģ%r"H��D��\\}2EL1n��h�j���e��"a*H����:��d��9c���[�X1~��"�3�g��Ñ�;O��<r_�)-�<%a�I9�󤶕󤜪�8v�s�4z0�97Wcp���x�4�^���M�D*�' . "\0" . '
��
endstream
endobj
6 0 obj
<</Type /Font
/BaseFont /Helvetica-Bold
/Subtype /Type1
/Encoding /WinAnsiEncoding
/ToUnicode 5 0 R
>>
endobj
7 0 obj
<</Type /Font
/BaseFont /Helvetica
/Subtype /Type1
/Encoding /WinAnsiEncoding
/ToUnicode 5 0 R
>>
endobj
2 0 obj
<<
/ProcSet [/PDF /Text /ImageB /ImageC /ImageI]
/Font <<
/F1 6 0 R
/F2 7 0 R
>>
/XObject <<
>>
>>
endobj
8 0 obj
<<
/Producer (FPDF 1.85)
/Title (Coello.be)
/Author (Robinson Coello <info@coello.be>)
/Creator (Coello.be)
/Keywords (invoice->exportJson\\(\\))
/Subject (Invoice)
/CreationDate (D:19700101010000+01\'00\')
>>
endobj
9 0 obj
<<
/Type /Catalog
/Pages 1 0 R
>>
endobj
xref
0 10
0000000000 65535 f 
0000005066 00000 n 
0000005818 00000 n 
0000000009 00000 n 
0000000087 00000 n 
0000005153 00000 n 
0000005587 00000 n 
0000005705 00000 n 
0000005932 00000 n 
0000006153 00000 n 
trailer
<<
/Size 10
/Root 9 0 R
/Info 8 0 R
>>
startxref
6202
%%EOF
';
//vardump($base64);
//vardump(base64_decode($base64));

include view("docs_exchange", "export_pdf");
if ($debug) {
    include "www/docs_exchange/views/debug.php";
}