<?php

/* HomeBundle:Menu:geral.html.twig */
class __TwigTemplate_3ed17ef2e6707b27d2536622b9a0085933d688312d9f451ef9b4bf06b998e499 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<nav class=\"navbar navbar-default\" role=\"navigation\">
    <div class=\"navbar-inner\">
        <div class=\"container\" style=\"width: auto;\">
            <a id=\"brand\" href=\"/\" class=\"navbar-link\" >
                <img src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/principal/images/elever.png"), "html", null, true);
        echo "\" class=\"menu_logo pull-left\">
            </a>

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-ex1-collapse\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse navbar-ex1-collapse\">
                <ul class=\"nav navbar-nav\">
                    <li>
                        <a href=\"/\">Principal</a>
                    </li>
                    <li>
                        <a href=\"/cliente\">Clientes</a>
                    </li>
                    <li>
                        <a href=\"/venda\">Vendas</a>
                    </li>
                    <li>
                        <a href=\"/report\">Report</a>
                    </li>
                </ul>

                <img src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "getToken", array(), "method"), "getUser", array(), "method"), "getImagen", array(), "method")), "html", null, true);
        echo "\" class=\"pull-right img-circle profileImage\">

                <ul class=\"nav pull-right\">
                    <li id=\"fat-menu\" class=\"dropdown\">
                        <a href=\"#\" id=\"drop3\" role=\"button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            ";
        // line 41
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "getToken", array(), "method"), "getUser", array(), "method"), "getNome", array(), "method")), "html", null, true);
        echo "<b class=\"caret\"></b>
                            <br />
                            <span class=\"small\">";
        // line 43
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "getToken", array(), "method"), "getUser", array(), "method"), "getIdPerfil", array(), "method"), "getNome", array(), "method")), "html", null, true);
        echo "</span>
                        </a>
                        <ul class=\"dropdown-menu\" role=\"menu\" aria-labelledby=\"drop3\">
                            <li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">Mensagens</a></li>
                            <li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">Telefonia</a></li>
                            <li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">Chat</a></li>
                            <li role=\"presentation\" class=\"divider\"></li>
                            <li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">Atendimento</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>

<div class=\"clear\"></div>";
    }

    public function getTemplateName()
    {
        return "HomeBundle:Menu:geral.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 43,  67 => 41,  59 => 36,  26 => 6,  19 => 1,);
    }
}
