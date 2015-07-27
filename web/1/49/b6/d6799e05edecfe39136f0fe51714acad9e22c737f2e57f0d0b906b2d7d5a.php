<?php

/* ClienteBundle:Default:index.html.twig */
class __TwigTemplate_49b6d6799e05edecfe39136f0fe51714acad9e22c737f2e57f0d0b906b2d7d5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("PrincipalBundle::base.html.twig", "ClienteBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'nav' => array($this, 'block_nav'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrincipalBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "elever - Clientes";
    }

    // line 5
    public function block_nav($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if ($this->env->getExtension('security')->isGranted("ROLE_USUARIO")) {
            // line 7
            echo "        ";
            $this->loadTemplate("HomeBundle:Menu:vendedor.html.twig", "ClienteBundle:Default:index.html.twig", 7)->display($context);
            // line 8
            echo "    ";
        } elseif ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 9
            echo "        ";
            $this->loadTemplate("HomeBundle:Menu:geral.html.twig", "ClienteBundle:Default:index.html.twig", 9)->display($context);
            // line 10
            echo "    ";
        }
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    <div class=\"container\">
        Pagina de clientes - ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "getImagen", array(), "method"), "html", null, true);
        echo "
    </div>
    ";
        // line 17
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = array())
    {
        // line 18
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/home/js/navbar.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "ClienteBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  68 => 17,  63 => 15,  60 => 14,  57 => 13,  52 => 10,  49 => 9,  46 => 8,  43 => 7,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
    }
}
