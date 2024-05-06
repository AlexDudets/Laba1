

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/registration", name="registration_submit", methods={"POST"})
     */
    public function submit(Request $request)
    {
        $login = $request->request->get('login');
        $password = $request->request->get('password');
        
        // Здесь вы можете выполнить необходимую логику для регистрации пользователя
        // Например, сохранить данные в базу данных или выполнить дополнительные проверки
        
        // Возвращаем ответ пользователю
        return $this->redirectToRoute('registration_success');
    }
    
    /**
     * @Route("/registration/success", name="registration_success")
     */
    public function success()
    {
        return $this->render('register/success.html.twig');
    }
}