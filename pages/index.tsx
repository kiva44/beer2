import { Htag, Button } from '../components';

export default function Home(): JSX.Element {

  return (
    <>

      <Htag tag='h1'>Рейтинг пабов по версии Пиводня</Htag>
      <Button appearance='primary'>Кнопка</Button>
      <Button appearance='ghost' arrow='right'>Кнопка2</Button>

    </>
  );
}
