MinimalOriginal SecurityBundle
========

The security bundle for Minimal

Command to launch
========
bin/console fos:user:create testuser test@example.com p@ssword --super-admin

Register bundle
========
$bundles = [
    ...
    new FOS\UserBundle\FOSUserBundle(),
    new MinimalOriginal\SecurityBundle\MinimalSecurityBundle(),
];

Register routes
========
minimal_security:
    resource: "@MinimalSecurityBundle/Resources/config/routing.yml"
    prefix:   /

Security configuration
========
security:
    encoders:
        MinimalOriginal\SecurityBundle\Entity\User: bcrypt

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: ROLE_ADMIN

    providers:
        minimal_security:
            id: fos_user.user_provider.username_email

    firewalls:
        main:
            pattern: ^/
            form_login:
                provider: minimal_security
                csrf_token_generator: security.csrf.token_manager
                # if you are using Symfony < 2.8, use the following config instead:
                # csrf_provider: form.csrf_provider

            logout:       true
            anonymous:    true

    access_control:
        - { path: ^/login$, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/register, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/resetting, role: IS_AUTHENTICATED_ANONYMOUSLY }
        - { path: ^/admin/, role: ROLE_USER }
