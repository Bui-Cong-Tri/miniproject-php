<?php

class JwtUtils
{
    private static string $secretToken = "432A462D4A614E635266556A586E3272357538782F413F4428472B4B62506553";
    public static int|float $expirationTime = 3600 * 24;
    public static int|float $expirationTimeForRememberMe = 3600 * 24 * 30;

    private function base64UrlEncode($data): array|string
    {
        $base64 = base64_encode($data);
        return str_replace(['+', '/', '='], ['-', '_', ''], $base64);
    }

    private function base64UrlDecode($data): bool|string
    {
        $base64 = str_replace(['-', '_'], ['+', '/'], $data);
        $base64Pad = $base64 . substr('==', (2 - strlen($data) * 3) % 4);
        return base64_decode($base64Pad);
    }

    private function createJwtToken($header, $payload): string
    {
        $headerJson = json_encode($header);
        $payloadJson = json_encode($payload);

        $headerBase64 = $this->base64UrlEncode($headerJson);
        $payloadBase64 = $this->base64UrlEncode($payloadJson);

        $signature = hash_hmac('sha256', $headerBase64 . '.' . $payloadBase64, self::$secretToken, true);
        $signatureBase64 = $this->base64UrlEncode($signature);

        return $headerBase64 . '.' . $payloadBase64 . '.' . $signatureBase64;
    }


    private function verifyJwtToken($jwtToken): bool
    {
        $jwtParts = explode('.', $jwtToken);
        if (count($jwtParts) !== 3) {
            return false;
        }
        $headerBase64 = $jwtParts[0];
        $payloadBase64 = $jwtParts[1];
        $signatureBase64 = $jwtParts[2];
        $signature = $this->base64UrlDecode($signatureBase64);
        $expectedSignature = hash_hmac('sha256', $headerBase64 . '.' . $payloadBase64, self::$secretToken, true);

        if (!hash_equals($signature, $expectedSignature)) {
            return false;
        }

        return true;
    }

    public function isTokenValid($token): bool
    {
        if (!$this->base64UrlDecode($token)) {
            return false;
        } else {
            $splitToken = explode('.', $token);
            $payload = json_decode($this->base64UrlDecode($splitToken[1]));
            $header = $this->base64UrlDecode($splitToken[0]);
            if (isset($payload->exp) && $payload->exp < time()) {
                return false;
            } else {
                $isValid = $this->verifyJwtToken($token, self::$secretToken);
                if ($isValid) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function extractUser($token)
    {
        $token = explode('.', $token);
        $payload = json_decode($this->base64UrlDecode($token[1]));
        return $payload->user;
    }

    public function generateToken($user, $remember): string
    {
        $expirationTime = 0;
        if ($remember === 'on') {
            $expirationTime = self::$expirationTimeForRememberMe;
        } else {
            $expirationTime = self::$expirationTime;
        }
        $header = ['alg' => 'HS256', 'typ' => 'JWT'];
        $payload = ['user' => ['code' => $user['code'], 'email' => $user['email']], 'iat' => time(), 'exp' => time() + $expirationTime];
        return $this->createJwtToken($header, $payload, self::$secretToken);
    }
}