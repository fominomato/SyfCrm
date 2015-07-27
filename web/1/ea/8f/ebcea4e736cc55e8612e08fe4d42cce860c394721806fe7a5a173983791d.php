<?php

/* PrincipalBundle:Default:login.html.twig */
class __TwigTemplate_ea8febcea4e736cc55e8612e08fe4d42cce860c394721806fe7a5a173983791d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("PrincipalBundle::base.html.twig", "PrincipalBundle:Default:login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container loginspace\">

    <div class=\"row\">

        <div class=\"col-sm-6 col-md-4 col-md-offset-4\">
            <div class=\"account-wall\">
                <h1 class=\"text-center login-title\">Entrar no E-lever</h1>
                <img class=\"profile-img\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/principal/images/elever.png"), "html", null, true);
        echo "\" alt=\"e-lever\"  />

                <form action=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" role=\"form\" class=\"form-signin\">

                    ";
        // line 15
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 16
            echo "                        <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageData", array()), "security"), "html", null, true);
            echo "</div>
                    ";
        }
        // line 18
        echo "
                    <div class=\"form-group\">
                        <label for=\"username\" >login:</label>
                        <input type=\"text\" id=\"username\" name=\"_username\" class=\"form-control\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
                    </div>

                    <div class=\"form-group\">
                        <label for=\"password\">Senha:</label>
                        <input type=\"password\" id=\"password\" class=\"form-control\" name=\"_password\" />
                    </div>

                    <button type=\"submit\" class=\"btn btn-lg btn-primary btn-block\">login</button>

                </form>
            </div>
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "PrincipalBundle:Default:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 21,  58 => 18,  52 => 16,  50 => 15,  45 => 13,  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
