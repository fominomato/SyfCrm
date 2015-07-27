<?php

/* PrincipalBundle::base.html.twig */
class __TwigTemplate_561e92b39798fdbd77f73ae52d99ceebf93941304632f56bb587a5a824b8b9f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascriptsHead' => array($this, 'block_javascriptsHead'),
            'nav' => array($this, 'block_nav'),
            'sidebar' => array($this, 'block_sidebar'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "feb9ff2_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_0") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_bootstrap-theme.css_1.css");
            // line 10
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_1") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_bootstrap-theme.min_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_2") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_bootstrap.css_3.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_3") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_bootstrap.min_4.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_4") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_footer_5.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_5") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_jquery-ui.min_6.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_6") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_login_7.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
            // asset "feb9ff2_7"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2_7") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general_part_1_menu_8.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "feb9ff2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_feb9ff2") : $this->env->getExtension('assets')->getAssetUrl("src/PrincipalBundle/Resources/css/general.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />

        ";
        // line 15
        $this->displayBlock('javascriptsHead', $context, $blocks);
        // line 20
        echo "
    </head>
    <body>
        <div id=\"wrap\">
            ";
        // line 24
        $this->displayBlock('nav', $context, $blocks);
        // line 25
        echo "
            ";
        // line 26
        $this->displayBlock('sidebar', $context, $blocks);
        // line 27
        echo "

            ";
        // line 29
        $this->displayBlock('body', $context, $blocks);
        // line 30
        echo "        </div>

        <div class=\"divider\"></div>
        ";
        // line 33
        $this->displayBlock('footer', $context, $blocks);
        // line 36
        echo "
        ";
        // line 37
        $this->displayBlock('javascripts', $context, $blocks);
        // line 40
        echo "    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Elever-CRM!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 15
    public function block_javascriptsHead($context, array $blocks = array())
    {
        // line 16
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/principal/js/jquery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/principal/js/jquery-ui.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/principal/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    // line 24
    public function block_nav($context, array $blocks = array())
    {
    }

    // line 26
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
    }

    // line 33
    public function block_footer($context, array $blocks = array())
    {
        // line 34
        echo "            ";
        $this->loadTemplate("PrincipalBundle::footer.html.twig", "PrincipalBundle::base.html.twig", 34)->display($context);
        // line 35
        echo "        ";
    }

    // line 37
    public function block_javascripts($context, array $blocks = array())
    {
        // line 38
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/home/js/navbar.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "PrincipalBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 38,  200 => 37,  196 => 35,  193 => 34,  190 => 33,  185 => 29,  180 => 26,  175 => 24,  169 => 18,  165 => 17,  160 => 16,  157 => 15,  152 => 6,  146 => 5,  141 => 40,  139 => 37,  136 => 36,  134 => 33,  129 => 30,  127 => 29,  123 => 27,  121 => 26,  118 => 25,  116 => 24,  110 => 20,  108 => 15,  103 => 13,  100 => 12,  44 => 10,  39 => 7,  37 => 6,  33 => 5,  27 => 1,);
    }
}
