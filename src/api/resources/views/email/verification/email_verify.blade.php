<table style="background:#EEE;padding:40px;border:1px solid #DDD;margin:0 auto;font-family:calibri;">
    <tr>
        <td>
            <table style="background:#FFF;width:100%;border:1px solid #CCC;padding:0;margin:0;border-collapse:collapse;max-width:100%;width:550px;border-radius:10px;">
                <!-- Welcome Salutation -->
                <tr>
                    <td style="padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                        Welcome to MyStockPortal
                    </td>
                </tr>
                <!-- User Msg -->
                <tr>
                    <td style="padding:10px 30px;margin:0;text-align:left;">
                        <p>Hi {{ $name }},</p>
                        <p>To activate your account please follow the below link</p>
                    </td>
                </tr>
                <!-- Link Button -->
                <tr>
                    <td style="padding:10px 30px;margin:0;text-align:center;">
                        <p><a href="{{ $verify_url }}" style="background:#4A7BA5;color:#FFF;padding:10px;text-decoration:none;">Activate Account</a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
