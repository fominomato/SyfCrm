<?php

/* ClienteBundle:Default:list.html.twig */
class __TwigTemplate_de0e16dfb791bed4fe1a08cef6955e61492732ed2ead39979ec8e56b3a52685c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("PrincipalBundle::base.html.twig", "ClienteBundle:Default:list.html.twig", 1);
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
        $this->loadTemplate("HomeBundle:Menu:geral.html.twig", "ClienteBundle:Default:list.html.twig", 6)->display($context);
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "    <div class=\"container\">
        Lista de clientes
    </div>
    ";
        // line 13
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "        <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/home/js/navbar.js"), "html", null, true);
        echo "\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "ClienteBundle:Default:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 14,  53 => 13,  48 => 10,  45 => 9,  40 => 6,  37 => 5,  31 => 3,  11 => 1,);
    }
}
