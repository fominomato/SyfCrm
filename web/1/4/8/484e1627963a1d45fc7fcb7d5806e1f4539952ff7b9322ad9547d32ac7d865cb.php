<?php

/* ClienteBundle:Cliente:new.html.twig */
class __TwigTemplate_484e1627963a1d45fc7fcb7d5806e1f4539952ff7b9322ad9547d32ac7d865cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("ClienteBundle::base.html.twig", "ClienteBundle:Cliente:new.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ClienteBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"container\">
    <h1>Novo cliente</h1>

    <form action=\"/cliente/\" method=\"post\">

        <div class=\"row\">
            <div id=\"form-group\">
                <label class=\"required control-label col-xs-2\" for=\"nome\">Nome: </label>
                <div class=\"col-xs-4\">
                    <input type=\"text\" placeholder=\"Digite o nome da conta\" class=\"form-control\" required=\"required\" name=\"nome\" id=\"nome\">
                </div>

            </div>
            <div id=\"form-group\">
                <label class=\"required control-label col-xs-2\" for=\"email\">Email de contato: </label>
                <div class=\"col-xs-4\">
                    <input type=\"text\" placeholder=\"Digite um email de contato\" class=\"form-control\" required=\"required\" name=\"email\" id=\"email\">
                </div>
            </div>
            <div id=\"form-group\">

                <label class=\"control-label col-xs-2\" for=\"cnpj\">Cnpj</label>
                <div class=\"col-xs-4\">
                    <input type=\"text\" class=\"form-control\" maxlength=\"100\" name=\"cnpj\" id=\"cnpj\" placeholder=\"Digite aqui o cnpj\">
                </div>
            </div>
        </div>

            <div class=\"row\">
                <div class=\"col-xs-4\">
                    <label for=\"cpf\">Cpf</label>
                    <input type=\"text\" maxlength=\"15\" name=\"cpf\" id=\"cpf\">
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-xs-4\">
                    <label for=\"emailOutro\">Email outro</label>
                    <input type=\"email\" maxlength=\"255\" name=\"emailOutro\" id=\"emailOutro\">
                </div>
            </div>

            <div class=\"form-group\">
                <label for=\"ativo\">Ativo</label>
                <input type=\"checkbox\" value=\"1\" name=\"ativo\" id=\"ativo\">
            </div>

            <div class=\"form-group\">
                <label for=\"excluido\">Excluido</label>
                <input type=\"checkbox\" value=\"1\" name=\"excluido\" id=\"excluido\">
            </div>

            <div class=\"form-group\">
                <label for=\"idUsuario\">Id usuario</label>
                <select name=\"idUsuario\" id=\"idUsuario\">
                    <option value=\"\"></option>
                    <option value=\"1\">user</option>
                    <option value=\"2\">admin</option>
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"idTemperatura\">Id temperatura</label>
                <select name=\"idTemperatura]\" id=\"idTemperatura\">
                    <option value=\"\"></option></select>

            </div>

            <div class=\"form-group\">
                <label for=\"idMomento\">Id momento</label>
                <select name=\"idMomento\" id=\"idMomento\">
                    <option value=\"\"></option></select>

            </div>

            <div class=\"form-group\">
                <label for=\"idClienteRelacionado\">Id cliente relacionado</label>

                <select name=\"idClienteRelacionado\" id=\"idClienteRelacionado\">
                    <option value=\"\"></option></select>
            </div>

            <div class=\"form-group\">
                <button name=\"submit\" id=\"submit\" type=\"submit\">Create</button>
            </div>

        </div>
    </form>

    <ul class=\"record_actions\">
        <li>
            <a href=\"";
        // line 95
        echo $this->env->getExtension('routing')->getPath("cliente");
        echo "\">
                Voltar para listagem
            </a>
        </li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "ClienteBundle:Cliente:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 95,  31 => 4,  28 => 3,  11 => 1,);
    }
}
